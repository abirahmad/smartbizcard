@extends('layouts.master')

@section('content')
<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row pt-4 justify-content-center">
          <div class="col-lg-9 col-6">
              <div class="membership-section   ">
                  <h4 class="font-weight-bold mb-4">Settings</h4>
                 
              
              </div>
            

          </div>
          <div class="col-lg-3 col-6">
            
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="transaction-text">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
              </ol>
        </div>
        </div>
        
    
    
      <div class="transaction-body pb-3 ">
       <div class="card">
           <div class="card-header">
               <h5><i class="far fa-bell text-primary mr-1"></i> Account Setting</h5>
           </div>
           <div class="card-body">
            <form>
                <div class="row">
                  <div class="col">
                    <label for="inputEmail4">Username*</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="far fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                   
                  </div>
                  <div class="col">
                    <label for="inputEmail4">Email Address</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="far fa-envelope"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email">
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputEmail4">New Password</label>
                      <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <label for="inputEmail4">Confirm Password</label>
                      <input type="text" class="form-control" placeholder="Last name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                        <label for="inputEmail4">Phone</label>
                      <input type="text" class="form-control" placeholder="First name">
                    </div>
                   
                  </div>
              </form>
              <button class="btn btn-primary mt-3">Save Changes</button>
           </div>
       </div>
     </div>
     <div class="transaction-body pb-3 ">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-file-invoice text-primary mr-1"></i> Billing Details</h5>
            </div>
            <div class="card-body">
             <form>
                 <div class="row">
                   <div class="col">
                     <label for="inputEmail4">Type</label>
                     <div class="input-group mb-2">
                        
                         <input type="text" class="form-control" placeholder="Personal">
                     </div>
                    
                   </div>
                   <div class="col">
                     <label for="inputEmail4">Name*</label>
                     <div class="input-group mb-2">
                         
                         <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Name">
                       </div>
                   </div>
                 </div>
                 <div class="row">
                     <div class="col">
                         <label for="inputEmail4">Address*</label>
                       <input type="text" class="form-control" placeholder="Address">
                     </div>
                     <div class="col">
                         <label for="inputEmail4">City*</label>
                       <input type="text" class="form-control" placeholder="City">
                     </div>
                   </div>
                   <div class="row mt-1">
                     <div class="col">
                         <label for="inputEmail4">State*</label>
                       <input type="text" class="form-control" placeholder="State">
                     </div>
                     <div class="col">
                        <label for="inputEmail4">Zip code*</label>
                      <input type="text" class="form-control" placeholder="Zip code">
                    </div>
                   
                    
                   </div>
                   <div class="row mt-1">
                   
                   <div class="col-6">
                       <label for="inputEmail4">Country*</label>
                       <select id="inputState" class="form-control">
                           
                           <option selected>Bangladesh</option>
                           <option>India</option>
                           <option>UK</option>
                           <option>Canada</option>
                         </select>
                   </div>
                   
                  </div>
               </form>
               <button class="btn btn-primary mt-3">Save Changes</button>
            </div>
        </div>
      </div>
            </div>
        </div>
        </div></section>
</div>
@endsection