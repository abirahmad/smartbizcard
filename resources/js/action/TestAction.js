import axios from 'axios';
import * as Types from '../types/Types';

export const getTestListData = () => async dispatch => {
  const responseData = {
    data: null
  };
  try {
    await axios
      .get(`https://jsonplaceholder.typicode.com/todos/1`)
      .then(res => {
        console.log(`res`, res);
        responseData.data = res.data
        dispatch({ type: Types.GET_TEST_DATA, payload: res });
      })
      .catch(e => {
        console.log(`error`, e);
      });
  } catch (er) {
    console.log(`error`, er);
  }
};
