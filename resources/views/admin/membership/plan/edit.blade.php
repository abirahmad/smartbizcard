@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">
        <div class="container-fluid pt-5">
            <div class="basic-card p-3 mx-3">
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head">Edit Membership Plan</h4>
                    </div>
                      
                    <div class="col-lg-12">
                         <div class="edit__from__container">
                            <form action="{{ route('admin.plans.update', $paln_details->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status"
                                        {{ $paln_details->status == '1' ? 'checked' : ' ' }}>
                                    <label class="custom-control-label" for="customSwitch1">Activate</label>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Plan name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="inputEmail3" name="name" value="{{ $paln_details->name }}"
                                            placeholder="Plan Name">
    
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Monthly Price</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="any" name="monthly_price"
                                            class="form-control @error('monthly_price') is-invalid @enderror"
                                            id="inputPassword3" placeholder="Monthly Price"
                                            value="{{ $paln_details->monthly_price }}">
    
                                        @error('monthly_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Annual Price</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="any" name="annual_price"
                                            class="form-control @error('annual_price') is-invalid @enderror"
                                            id="inputPassword3" placeholder="Annual Price"
                                            value="{{ $paln_details->annual_price }}">
    
                                        @error('annual_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Lifetime Price</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="any" name="lifetime_price"
                                            class="form-control @error('lifetime_price') is-invalid @enderror"
                                            id="inputPassword3" placeholder="Lifetime Price"
                                            value="{{ $paln_details->lifetime_price }}">
    
                                        @error('lifetime_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="frequency" class="col-sm-3 col-form-label">Plan Frequency</label>
                                    <div class="col-sm-6">
                                    <select class="form-control @error('frequency') is-invalid @enderror" id="status" name="frequency">
                                            <option value="0" {{$paln_details->frequency == 0 ? 'selected' : ''}}>Monthly</option>
                                            <option value="1" {{$paln_details->frequency == 1 ? 'selected' : ''}}>Annaual</option>
                                            <option value="2" {{$paln_details->frequency == 2 ? 'selected' : ''}}>Yearly</option>
                                    </select>

                                    @error('frequency')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="recommended" class="custom-control-input"
                                        id="customSwitch2" {{ $paln_details->recommended == 'yes' ? 'checked' : ' ' }}>
                                    <label class="custom-control-label" for="customSwitch2">Recommanded</label>
                                </div>
                                <h4 class="plan__setting">Plan Settings</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Scans Limit Per
                                        Month</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="any" name="scan_limit_per_month" class="form-control"
                                            id="inputPassword3" placeholder="Lifetime Price"
                                            value="{{ $paln_details->scan_limit_per_month }}">
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Additional Filed
                                        Limit</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="any" name="additional_field_limit" class="form-control"
                                            id="inputPassword3" placeholder="Lifetime Price"
                                            value="{{ $paln_details->additional_field_limit }}">
                                    </div>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="hide_branding" class="custom-control-input"
                                        id="customSwitch3" {{ $paln_details->hide_branding == 'yes' ? 'checked' : ' ' }}>
                                    <label class="custom-control-label" for="customSwitch3">Hide Branding</label>
                                </div>
                                <h4 class="plan__setting">Custom Settings</h4>
                                <div class="form-group row">
                                    <label for="inputPassword80" class="col-sm-3 col-form-label">Select Setting</label>
                                    <div class="col-sm-6">
                                        <select multiple="multiple" class="form-control js-example-basic-multiple-two @error('custom_setting') is-invalid @enderror"
                                            id="inputPassword80" name="custom_setting[]">
                                            @foreach ($settings as $setting)
                                                <option value="{{ $setting->id }}" @foreach ($editSetting as $cs) {{ $cs->custom_setting_id == $setting->id ? 'selected' : '' }} @endforeach>
                                                    {{ $setting->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('custom_setting')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <h4 class="plan__setting">Taxes</h4>
                                <hr>
                                <div class="form-group row">
                                    <label for="inputPassword8" class="col-sm-3 col-form-label">Select Taxes</label>
                                    <div class="col-sm-6">
                                        <select multiple="multiple" class="form-control js-example-basic-multiple @error('taxes_ids') is-invalid @enderror"
                                            id="inputPassword8" name="taxes_ids[]">
                                            @foreach ($taxes as $tax)
                                                <option value="{{ $tax->id }}" @foreach ($editTax as $tx) {{ $tx->tax_id == $tax->id ? 'selected' : '' }} @endforeach>
                                                    {{ $tax->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('taxes_ids')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Add Team Member</label>
                                    <div class="col-sm-6">
                                        <input type="text" step="any" name="team_member"
                                            class="form-control @error('team_member') is-invalid @enderror"
                                            id="inputPassword3" placeholder="Add Team Member"
                                            value="{{ $paln_details->team_member }}">
    
                                        @error('team_member')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Customize Card Fee</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="any" name="customize_card"
                                            class="form-control @error('customize_card') is-invalid @enderror"
                                            id="inputPassword3" placeholder="Customize Card Fee"
                                            value="{{ $paln_details->customize_card }}">
    
                                        @error('customize_card')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
@endsection
