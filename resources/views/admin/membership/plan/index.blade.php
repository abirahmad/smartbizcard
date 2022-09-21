@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">
        <div class="">
            <div class="container-fluid pt-5">
                <div class="basic-card p-3 mx-3">
                <div class="row">
                    <div class="col-lg-10 col-8 ">
                        <h4 class="allbizcard__head">Membership Plan</h4>
                    </div>
                    {{-- <div class="col-lg-2 col-4">
                        <button type="button" class="btn btn-primary border-radius20 py-1 px-3" data-toggle="modal" data-target="#planModalCenter">Add Plan</button>
                    </div> --}}
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="plan">
                                <thead>
                                    <tr>
                                        <th scope="col">Plan Name</th>
                                        <th scope="col">Monthly Price</th>
                                        <th scope="col">Annual Price</th>
                                        <th scope="col">Lifetime Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->monthly_price }}</td>
                                            <td>{{ $item->annual_price }}</td>
                                            <td>{{ $item->lifetime_price }}</td>
                                            <td>
                                                <a href="#changeStatusModal{{ $item->id }}" data-toggle="modal">
                                                        @if($item->status == 1)
                                                           <span class="action__edit__blue"><i class="fa fa-check"></i> Active</span> 
                                                        @else
                                                           <span class="action__delete__after"><i class="fa fa-times"></i> Inactive</span> 
                                                        @endif     
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.plans.edit', $item->id) }}"
                                                    class="action__edit__blue"><i class="fas fa-pencil-alt membership"></i><span>Edit</span></a>

                                                <form class="delete__btn" action="{{ route('admin.plans.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action__delete__after"><i class="fas fa-trash-alt membership"></i>
                                                      <span>Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Delete Category Modal -->

                                        <div class="modal fade bd-example-modal-sm" id="changeStatusModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title">{{ $item->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal__body-invoice">
                                                <form role="form" action="{{route('admin.plan.update.status', $item->id)}}" method="post">
                                                @csrf
                                                    <div class="form-row">
                                                    <div class="col-lg-6 col-12">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="0" {{$item->status == 0 ? 'selected' : ''}}>Inactive</option>
                                                        <option value="1" {{$item->status == 1 ? 'selected' : ''}}>Active</option>
                                                    </select>
                                                    </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Modal Area Starts --}}
            <div  id="planModalCenter"  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="planModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered add-plan-modal" role="document">
                    <div class="modal-content">
                        <div class="modal-header my-mod-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add a plan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="close__modal">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.plans.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
                                            <label class="custom-control-label" for="customSwitch1">Activate</label>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="inputEmail3" class=" col-form-label">Plan name</label>
                                            <div class="">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    id="inputEmail3" name="name" placeholder="Plan Name">
        
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="form-group mb-0">
                                            <label for="inputPassword3" class=" col-form-label">Monthly Price</label>
                                            <div class="">
                                                <input type="number" step="any" name="monthly_price"
                                                    class="form-control @error('monthly_price') is-invalid @enderror"
                                                    id="inputPassword3" placeholder="Monthly Price">
        
                                                @error('monthly_price')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="form-group mb-0 ">
                                            <label for="inputPassword3" class=" col-form-label">Annual Price</label>
                                            <div class=" ">
                                                <input type="number" step="any" name="annual_price"
                                                    class="form-control @error('annual_price') is-invalid @enderror"
                                                    id="inputPassword3" placeholder="Annual Price">
        
                                                @error('annual_price')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="inputPassword3" class=" col-form-label">Lifetime Price</label>
                                            <div class="">
                                                <input type="number" step="any" name="lifetime_price"
                                                    class="form-control @error('lifetime_price') is-invalid @enderror"
                                                    id="inputPassword3" placeholder="Lifetime Price">
        
                                                @error('lifetime_price')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="recommended" class="custom-control-input"
                                                id="customSwitch2">
                                            <label class="custom-control-label" for="customSwitch2">Recommanded</label>
                                        </div>
                                        <h4 class="plan__setting">Plan Settings</h4>
                                        <hr>
                                        <div class="form-group mt-3 mb-0 ">
                                            <label for="inputPassword3" class=" col-form-label">Scans Limit Per
                                                Month</label>
                                            <div class="">
                                                <input type="number" step="any" name="scan_limit_per_month" class="form-control"
                                                    id="inputPassword3" placeholder="Lifetime Price">
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="inputPassword3" class=" col-form-label">Additional Filed
                                                Limit</label>
                                            <div class="">
                                                <input type="number" step="any" name="additional_field_limit" class="form-control"
                                                    id="inputPassword3" placeholder="Lifetime Price">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class=" col-form-label">Plan Frequency</label>
                                            <div class="">
                                                <select class="form-control @error('frequency') is-invalid @enderror" id="status" name="frequency">
                                                        <option value="0">Monthly</option>
                                                        <option value="1">Annaual</option>
                                                        <option value="2">Yearly</option>
                                                </select>

                                                @error('frequency')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                               
                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="hide_branding" class="custom-control-input"
                                            id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3">Hide Branding</label>
                                    </div>
                                    <h4 class="plan__setting">Custom Settings</h4>
                                    <hr>
                                    <div class="form-group ">
                                        <label for="inputPassword8" class=" col-form-label"> Select Settings</label>
                                        <div class="">
                                            <select multiple="multiple" class="form-control js-example-basic-multiple-two @error('custom_setting') is-invalid @enderror"
                                                id="inputPassword80" name="custom_setting[]">
                                                @foreach ($settings as $setting)
                                                    <option value="{{ $setting->id }}">{{ $setting->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('custom_setting')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   </div>
                                   <div class="col-md-6 mt-4">
                                    <h4 class="plan__setting">Taxes</h4>
                                    <hr>
                                    <div class="form-group ">
                                        <label for="inputPassword8" class=" col-form-label">Select Taxes</label>
                                        <div class="">
                                            <select multiple="multiple" class="form-control js-example-basic-multiple @error('taxes_ids') is-invalid @enderror"
                                                id="inputPassword8" name="taxes_ids[]">
                                                @foreach ($taxes as $tax)
                                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('taxes_ids')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   </div>
                               </div>
                               <div class="row">
                                <div class="col-md-6">
                                     
                        <div class="form-group  mt-3">
                            <label for="text" class=" col-form-label">Add Team Member</label>
                            <div class="">
                                <input type="number" step="any" name="team_member"
                                    class="form-control  @error('team_member') is-invalid @enderror" id="date"
                                    placeholder="Add Team Member">

                                @error('team_member')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                     
                                <div class="form-group  mt-3">
                                    <label for="text" class=" col-form-label">Customize Card Fee</label>
                                    <div class="">
                                        <input type="number" step="any" name="customize_card"
                                            class="form-control  @error('customize_card') is-invalid @enderror" id="date"
                                            placeholder="Customize Card Fee">

                                        @error('customize_card')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                        </div>
                                    </div>
                           
                        </div>                      
                                <div class="form-group row ">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
@endsection
