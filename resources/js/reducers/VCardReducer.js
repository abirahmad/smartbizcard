import * as Types from '../types/Types';
import configureStore from './configureStore';
const initialState = {
    SocailIconINput:[],
    social:null

};

const VCardReducer = (state = initialState, action) => {

    const newState = {...state};
    switch (action.type) {

      case Types.GET_SOCIAL_ITEM:
       let socialClone = state.SocailIconINput.slice();
            socialClone.push(action.payload);
        console.log(`socialClone`, socialClone);
        return {
          ...state,
            SocailIconINput:socialClone,
            social:"Her",
        };
      case Types.HANELE_INPUT_CHANGE:
    let socialCloneData = state.SocailIconINput.slice();

        

        console.log(`socialCloneData`, socialCloneData);



        return {
          ...state,
            // SocailIconINput:clone,
            social:"Her",
        };
      case Types.GET_SOCIAL_LINK:
      
        return {
          ...state,
            SocailIconINput:action.payload.data.options,


        };
      default:
        break;
    }
    return newState;
  };
  
  export default VCardReducer;
