@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">
      
            <div class="container-fluid pt-5">
                <div class="basic-card p-3 mx-3">
                <div class="row">
                    <div class="col-lg-10 col-8">
                        <h4 class="allbizcard__head">Taxes</h4>
                    </div>
                    <div class="col-lg-2 col-4">
                        <button type="button" class="btn btn-primary border-radius20 py-1 px-3" data-toggle="modal"
                            data-target="#exampleModalCenter">Add
                            Tax</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="plan">
                                <thead>
                                    <tr>
                                        <th scope="col">Tax</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Action</>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->internal_name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->value }}</td>
                                            <td>
                                                {{ $item->type }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.taxes.edit', $item->id) }}"
                                                    class="action__edit__blue mr-1"><i class="fas fa-pencil-alt membership"></i>
                                                    Edit
                                                </a>

                                                <form class="delete__btn" action="{{ route('admin.taxes.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action__delete__after"><i
                                                            class="fas fa-trash-alt membership"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header my-mod-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Tax</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="close__modal">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.taxes.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Internal Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('internal_name') is-invalid @enderror"
                                            id="inputEmail3" name="internal_name" placeholder="Internal Name">

                                        @error('internal_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail4" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="inputEmail4" name="name" placeholder="Name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail5" class="col-sm-4 col-form-label">Description</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputEmail5" name="description"
                                            placeholder="Description">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail6" class="col-sm-4 col-form-label">Tax Value</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control @error('value') is-invalid @enderror"
                                            id="inputEmail6" name="value" placeholder="Value">
                                        @error('value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword6" class="col-sm-4 col-form-label">Value Type</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('value_type') is-invalid @enderror"
                                            id="inputPassword6" name="value_type">
                                            <option value="1">Percentage</option>
                                            <option value="2">Fixed</option>
                                        </select>
                                        @error('value_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword7" class="col-sm-4 col-form-label">Type</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('type') is-invalid @enderror" id="inputPassword7"
                                            name="type">
                                            <option value="1">Inclusive</option>
                                            <option value="2">Exclusive</option>
                                        </select>
                                        @error('type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword8" class="col-sm-4 col-form-label">Billing For</label>
                                    <div class="col-sm-6">
                                        <select class="form-control @error('billing_type') is-invalid @enderror"
                                            id="inputPassword8" name="billing_type">
                                            <option value="1">Personal</option>
                                            <option value="2">Business</option>
                                            <option value="3">Both</option>
                                        </select>
                                        @error('billing_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword9" class="col-sm-4 col-form-label">Country</label>
                                    <div class="col-sm-6">
                                        <input type="text" step="any" name="country"
                                            class="form-control @error('country') is-invalid @enderror" id="inputPassword9"
                                            placeholder="Country">
                                        @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
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
