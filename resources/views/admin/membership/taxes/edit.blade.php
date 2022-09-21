@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">
        <div class="container-fluid pt-5">
            <div class=" basic-card mx-2 p-3">
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <h4 class="allbizcard__head">Edit Taxes</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.taxes.update', $tax_details->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row ">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Internal Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('internal_name') is-invalid @enderror"
                                        id="inputEmail3" name="internal_name" placeholder="Internal Name"
                                        value="{{ $tax_details->internal_name }}">
                                    @error('internal_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail4" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="inputEmail4" name="name" placeholder="Name" value="{{ $tax_details->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail5" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail5" name="description"
                                        placeholder="Description" value="{{ $tax_details->description }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="inputEmail6" class="col-sm-4 col-form-label">Tax Value</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('value') is-invalid @enderror"
                                        id="inputEmail6" name="value" placeholder="Value"
                                        value="{{ $tax_details->value }}">
                                    @error('value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword6" class="col-sm-4 col-form-label">Value Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="inputPassword6" name="value_type">
                                        <option value="percentage"
                                            {{ 'percentage' == $tax_details->value_type ? 'selected' : '' }}>Percentage
                                        </option>
                                        <option value="fixed" {{ 'fixed' == $tax_details->value_type ? 'selected' : '' }}>
                                            Fixed
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword7" class="col-sm-4 col-form-label">Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="inputPassword7" name="type">
                                        <option value="inclusive"
                                            {{ 'inclusive' == $tax_details->type ? 'selected' : '' }}>
                                            Inclusive</option>
                                        <option value="exclusive"
                                            {{ 'exclusive' == $tax_details->type ? 'selected' : '' }}>
                                            Exclusive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword8" class="col-sm-4 col-form-label">Billing For</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="inputPassword8" name="billing_type">
                                        <option value="personal"
                                            {{ 'personal' == $tax_details->billing_type ? 'selected' : '' }}>Personal
                                        </option>
                                        <option value="business"
                                            {{ 'business' == $tax_details->billing_type ? 'selected' : '' }}>Business
                                        </option>
                                        <option value="both"
                                            {{ 'both' == $tax_details->billing_type ? 'selected' : '' }}>
                                            Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword9" class="col-sm-4 col-form-label">Country</label>
                                <div class="col-sm-6">
                                    <input type="text" step="any" name="country"
                                        class="form-control @error('country') is-invalid @enderror" id="inputPassword9"
                                        placeholder="Country" value="{{ $tax_details->country }}">

                                    @error('country')
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
@endsection
