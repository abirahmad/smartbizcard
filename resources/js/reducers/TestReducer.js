import * as Types from '../types/Types';
const initialState = {
    TestList:[]
};

const TestReducer = (state = initialState, action) => {
    const newState = {...state};
    switch (action.type) {
      case Types.GET_TEST_DATA:
        console.log(`action.payload test`, action.payload);
        return {
          ...state,
            TestList:action.payload,
        };
      default:
        break;
    }
    return newState;
  };
  
  export default TestReducer; 