@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper pb-5">

        <div class="container-fluid pt-5">
            <div class="basic-card p-3 mx-3">
                <div class="">
                    <div class="float-left">
                        <h4 class="allbizcard__head ">Add Category</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('admin.categories.create') }}"
                            class="btn btn-primary  border-radius20 px-3 py-1 mt-2">Add Category</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container-fluid">
                            <div class="table-responsive product-table">
                                <table class="table table-striped table-bordered display " id="categories_table">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Position</th>
                                            <th>Active</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->position }}</td>
                                                <td>
                                                    @if ($category->active == '0')
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif

                                                    @if ($category->active == '1')
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                        class="action__edt"><i class="fas fa-pencil-alt mb-2"></i></a>
                                                    <form class="blogs__form"
                                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="action__delete__allBlog"> <i
                                                                class="fas fa-trash-alt mr-1"></i></button>
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
            </div>
        </div>
    </div>

    {{-- <form action="{{route('admin.blogs.destroy',4)}}" method="POST">
    @method('DELETE')
    @csrf
    <a type="submit" class="nav-link">
      <p>Edit Blogs</p>
    </a>
</form> --}}


@endsection
