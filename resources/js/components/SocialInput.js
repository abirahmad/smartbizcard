import React,{useEffect,useState} from 'react';
import ReactDOM from 'react-dom';
import { DeleteSocialLink, fethSocialIcon, hadleChangeItemData } from '../action/SocialInputAction';
import { getTestListData } from '../action/TestAction';
import { getSocialLink } from '../action/SocialInputAction';
import configureStore from '../reducers/configureStore';
import { checkObjectInArray } from '../util/Util';
import { Alert } from 'bootstrap';


function SocialInput(props) {

console.log(`props`, props);
    const store = configureStore();

    const [socailInputData, setsocailInputData] = useState([]);



// useEffect(() => {
//     if(Object.keys(props).length === 0){
//         console.log(`hello`, hello)
//     }

//     // if(props !== null){
//     //     let cloneSocialInput = socailInputData.slice();
//     //     cloneSocialInput.push(props);
//     //     setsocailInputData(cloneSocialInput);
//     // }

// }, )


  useEffect(() => {
    // store.dispatch(getSocialLink());

    intialData();


  }, []);

  useEffect(() => {


      let data = props.data
    if(Object.keys(props).length !== 0){


        let cloneSocialInput = socailInputData.slice();
        for (let i = 0; i < cloneSocialInput.length; i++) {
            if (cloneSocialInput[i].label == data.label) {
                toastr.error(`You have already added ${data.label}`);
              return false;
            }
          }

        cloneSocialInput.push(props.data);
        setsocailInputData(cloneSocialInput);
    }
  }, [props]);


  const intialData = async()=>{
    let data = await getSocialLink();
    setsocailInputData(data.data.options);
  }

  const handleDelete =(item)=>{

    let id = item.id
    console.log(`item`, item);
    let cloneObj = socailInputData.slice();
    for (var i = 0; i < cloneObj.length; i++) {
        if (cloneObj[i].label == item.label) {
          cloneObj.splice(i, 1);
          setsocailInputData(cloneObj);
        }
      }

      DeleteSocialLink(id);

  }

  const handleInputChange=(e,item)=>{
    let cloneSocial = socailInputData.slice();

    for (let i = 0; i < cloneSocial.length; i++) {
            if(cloneSocial[i].label == item.label){
                cloneSocial[i].social_link = e.target.value
            }
        }

        setsocailInputData(cloneSocial);

        console.log(`cloneSocial`, cloneSocial);
  }

  store.subscribe(() => {
    let socialInput = store.getState().vcard.SocailIconINput;
     setsocailInputData(socialInput);
  });
  console.log(`socailInputData`, socailInputData)


// console.log(`socailInputData`, socailInputData);

    return (
       <>


                        {
                            socailInputData &&  socailInputData.map((item)=>(
                                 <>

                                     <span>

                                         <label for="company"
                                                class="form-group user-panel-level">{item.label}</label>
                                    </span>
                                        <input type="text" class="form-control user-panel-input" name="socialInput[]"
                                            placeholder="Type"  value={item.social_link!==null?item.social_link:null} onChange={(e)=>handleInputChange(e,item)}/>
                                        <a className="btn btn-danger btn-sm" id="delete" onClick={()=>handleDelete(item)}>Delete</a>
                                        <input type="hidden" class="form-control user-panel-input" name="hidenItem[]"
                                            placeholder="Type"   value={item.id!==null?item.id:null}/>
                                        <input type="hidden" class="form-control user-panel-input" name="hiddenlevel[]"
                                            placeholder="Type"   value={item.label!=null?item.label:null}/>
                                 </>
                            ))
                        }
    </>
    );
}

export default SocialInput;

if (document.getElementById('socialInput')) {
    ReactDOM.render(<SocialInput />, document.getElementById('socialInput'));
}
