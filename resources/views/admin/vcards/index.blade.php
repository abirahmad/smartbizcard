@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper pb-5">

    <div class="container-fluid pt-5 ">
        <div class="basic-card p-3 mx-3">
        <div class="row">
            <div class="col-lg-5 col-12">
                <h4 class="allbizcard__head">All BizCard List</h4>
            </div>
            {{-- <div class="col-lg-7 col-12">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <p class="result__found">Results found 1000</p>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="dropdown show">
                            <a class="dropdown__top dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Display
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">10</a>
                                <a class="dropdown-item" href="#">100</a>
                                <a class="dropdown-item" href="#">150</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <form class="search__form">
                                <div class="align-items-center">
                                    <div class="">
                                        <div class="input-group my__grp">
                                            <div class="input-group-prepend ">
                                                <div class="input-group-text search__icon"><i class="fas fa-search"></i></div>
                                            </div>
                                            <input type="text" class="form-control search__box"  placeholder="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>
    
                        </div>
                    </div>
                </div>

            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped  display ajax_view" id="vCards_table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col" width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vCards as $key=>$vCard)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{$vCard->main_image? asset('public/backend/images/vcard/images/'.$vCard->main_image): '' }}" alt="AdminLTE Logo" class="small-avatar__img">
                                        <strong>{{$vCard->username?$vCard->username:''}}</strong>
                                    </td>
                                    <td>{{$vCard->title?$vCard->title:''}}</td>
                                    {{-- <td>
                                        {{-- {{$vCard->description?$vCard->description:''}} 
                                    </td> --}}
                                    <td>
                                    {{$vCard->company?$vCard->company:''}}
                                    </td>
                                    <td>
                                    {{$vCard->email?$vCard->email:''}}
                                    </td>
                                    <td>
                                        {{ date('d M Y H:i A', strtotime($vCard->created_at ? $vCard->created_at : '')) }}
                                    </td>
                                    <td>
                                        {{-- <a href="{{route('admin.blogs.edit',$vCard->id)}}" class="action__edt"><i class="fas fa-pencil-alt"></i></a> --}}
                                        <a href="{{route('admin.bizCard.update.status',$vCard->id)}}" class="action__edt" ><i class="fas fa-toggle-on"></i></a>


                                        <form class="blogs__form" record="admin.blogs.destroy" recordid="{{$vCard->id}}" action="{{route('admin.biz-cards.destroy',$vCard->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="action__delete__allBlog"><i class="fas fa-trash-alt"></i></button>
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
@endsection

{{-- <table class="table">
    <thead>
        <tr>
            <th scope="col">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                </div>

            </th>
            <th scope="col">Full Name</th>
            <th scope="col">Title</th>
            <th scope="col">Company Name</th>
            <th scope="col">Department</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Last Activity</th>
            <th scope="col" >Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">
                <input type="checkbox" class="" id="exampleCheck1">
            </th>
            <td>
                <img src="{{asset('public/backend/dist/img/tom.jpg')}}" alt="AdminLTE Logo" class="small-avatar__img">
                <strong>Steven moon Colbert</strong>
            </td>
            <td><strong>Manager</strong></td>
            <td><strong>Amazon</strong></td>
            <td><strong>HR</strong></td>
            <td><span class="reg__date">20 Apr 2020 02:00PM</span></td>
            <td> <span class="reg__date">21 Apr 2021 03:00PM</span></td>
            <td class="text-center">
            
                    <a href="#" class="action__edit"><i class="fas fa-pencil-alt"></i>  <span class="d__none">Edit</span></a>
                    <a href="#" class="action__delete"><i class="fas fa-trash-alt"></i> <span class="d__none"> Delete</span></a>
             
              
            </td>
        </tr>
     
    </tbody>
</table> --}}