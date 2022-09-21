import axios from 'axios';
import * as Types from '../types/Types';

export const socailIconSet = (item) => async dispatch => {
  const responseData = {
    data: item
  };
  try {
    dispatch({ type: Types.GET_SOCIAL_ITEM, payload: item });
  } catch (er) {
    console.log(`error`, er);
  }
};
export const hadleChangeItemData = (item) => async dispatch => {

  try {
    dispatch({ type: Types.HANELE_INPUT_CHANGE, payload: item });
  } catch (er) {
    console.log(`error`, er);
  }
};

export const fethSocialIcon = () => async dispatch => {

    const responseData = {
      data: null
    };
    try {
      await axios
        // .get(`http://192.168.0.104:8081/smartbiz/api/social-links`)
        .get(`https://smarterbizcard.com/api/social-links`)
        .then(res => {
          console.log(`res item`, res);
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
export const DeleteSocialLink = async (id) => {
    const responseData = {
      data: null
    };
    try {
      await axios
        // .get(`http://192.168.0.104:8081/smartbiz/api/delete-links/${id}`)
        .get(`https://smarterbizcard.com/api/delete-links/${id}`)
        .then(res => {
          console.log(`res item delete`, res);
          responseData.data = res.data
        //   dispatch({ type: Types.GET_TEST_DATA, payload: res });
        })
        .catch(e => {
          console.log(`error`, e);
        });
    } catch (er) {
      console.log(`error`, er);
    }
  };
// export const getSocialLink = () => async dispatch => {

//     const responseData = {
//         data: null
//       };
//       try {
//         await axios
//           .get(`http://10.17.3.94:8080/SmartVcard/public/api/social-links`)
//           .then(res => {
//             console.log(`res get social`, res);
//             responseData.data = res.data
//             dispatch({ type: Types.GET_SOCIAL_LINK, payload: responseData });
//           })
//           .catch(e => {
//             console.log(`error`, e);
//           });
//       } catch (er) {
//         console.log(`error`, er);
//       }

// };
export const getSocialLink = async ()  => {

    const responseData = {
        data: null
      };
      try {
        await axios
        // .get(`http://192.168.0.104:8081/smartbiz/api/social-links`)
          .get(`https://smarterbizcard.com/api/social-links`)
          .then(res => {
            console.log(`res get social`, res);
            responseData.data = res.data

            // dispatch({ type: Types.GET_SOCIAL_LINK, payload: responseData });
          })
          .catch(e => {
            console.log(`error`, e);
          });
      } catch (er) {
        console.log(`error`, er);
      }
      return responseData;

};
