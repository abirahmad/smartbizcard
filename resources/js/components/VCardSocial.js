import React, { useState } from "react";
import ReactDOM from "react-dom";
import { getSocialLink, socailIconSet } from "../action/SocialInputAction";
import configureStore from "../reducers/configureStore";
import SocialInput from "./SocialInput";

function VCardSocial() {
    const store = configureStore();
    const [selectedIcon, setselectedIcon] = useState([]);
    const [socicalIcon, setSocicalIcon] = useState([
        {
            id: 1,
            social_link: "",
            label: "Facebook",
            name:"fab fa-facebook-f",
            color:'#3A5A99'
        },
        {
            id: 2,
            social_link: "",
            label: "Twitter",
            name:"fab fa-twitter",
            color:'#55ACEE'
        },
        {
            id: 3,
            social_link: "",
            label: "Linked In",
            name:"fab fa-linkedin-in",
            color:'#0076B2'
        },
        {
            id: 4,
            social_link: "",
            label: "Snapchat",
            name:"fab fa-snapchat",
            color:'#3A5A99'
        },
        {
            id: 5,
            social_link: "",
            label: "Whatsapp",
            name:"fab fa-whatsapp",
            color:'#25D366'
        },
        {
            id: 6,
            social_link: "",
            label: "Youtube",
            name:"fab fa-youtube",
            color:'#E52D27'
        },
    ]);

    // useEffect(() => {
    //   store.dispatch(getSocialLink())

    // }, [])

    store.subscribe(() => {
        let data = store.getState().vcard.SocailIconINput;
        console.log(`data`, data);
        // ReactDOM.render( <SocialInput data={data} />, document.getElementById("socialInput") );

        //   data.map((item)=>(
        //     ReactDOM.render( <SocialInput data={item} />, document.getElementById("socialInput") )
        //   ))
    });

    const selectIcon = (item) => {
        //  store.dispatch(socailIconSet(item));
        ReactDOM.render(
            <SocialInput data={item} />,
            document.getElementById("socialInput")
        );
    };

    return (
        <div className="col-lg-5 col-md-6">
            <div className="card px-3 user-link-card pt-3 ml-lg-2">
                <h5 class="font-weight-bold link-title">Add link</h5>
                <div class="row mt-3 pb-5 ml-lg-1">
                    {socicalIcon.map((icon) => (
                        // <p onClick={()=>selectIcon(icon)}>{icon.label}</p>
                        <div class="col-2">
                            <div
                                class="icon"
                                style={{ backgroundColor: icon.color }}
                                onClick={()=>selectIcon(icon)}
                            >
                                <a id="facebook">
                                    {/* <i class="fab fa-facebook-f icon-style facebook-custom"></i> */}
                                    <i class={`${icon.name} icon-style facebook-custom`}></i>
                                </a>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}

export default VCardSocial;

if (document.getElementById("VCardSocial")) {
    // const propsContainer = document.getElementById("socialInput");
    // const props = Object.assign(selectedIcon, propsContainer.dataset);
    // console.log(`props`, props);
    ReactDOM.render(<VCardSocial />, document.getElementById("VCardSocial"));
}
