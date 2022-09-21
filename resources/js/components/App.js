import React,{useEffect} from 'react';
import ReactDOM from 'react-dom';
import { Provider,useDispatch, useSelector } from 'react-redux';
import { getTestListData } from '../action/TestAction';
import configureStore from '../reducers/configureStore';

const App =()=> {
     const store = configureStore();
    


  
    useEffect(() => {
        store.dispatch(getTestListData());
        // const data = store.getState().test.TestList;
        // console.log(`datas`, data);
    }, []);

   

    

    return (
        
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">I'm an example component!</div>
                        </div>
                    </div>
                </div>
            </div>
       

    );

}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
