import {combineReducers} from 'redux';
import TestReducer from './TestReducer';
import VCardReducer from './VCardReducer';


const RootReducer = combineReducers({

test:TestReducer,
vcard:VCardReducer,

});
export default RootReducer;