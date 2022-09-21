@extends('layouts.frontend-master')

@section('content')

    <!-- Content
================================================== -->
    <!-- Section How it Work Start-->
    <div class="blog-post my-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6 offset-lg-1">
                    <div class="blog-banner">
                        <div class="blog-banner-image">
                            <img src="{{ $sblog?asset('public/assets/images/blogs/'.$sblog->image):'' }}" alt="blog-img" />
                        </div>
                        <div class="blog-content">
                            <h3 class="font-weight-bold my-2">{{$sblog?$sblog->title:''}}</h3>
                            <span class="badge badge-pill badge-primary py-2 px-3 blog-badge-one">{{$sblog?date('d, M Y', strtotime($sblog->created_at)):''}}</span>
                            <span class="badge badge-pill badge-primary py-2 px-3 blog-badge ml-2"><i
                                    class="fas fa-tag mr-1"></i>{!! $sblog?$sblog->cateTitle:'' !!} </span>
                            <p class="my-4">{!! $sblog? $sblog->description:''!!}</p>
                           
                        </div>
                        <div class="blog-socialmedia">
                            <i class="fas fa-share-alt p-2 rounded mr-1"></i>
                            <i class="far fa-envelope p-2 text-white rounded"></i>
                            <i class="fab fa-facebook-f p-2 text-white rounded"></i>
                            <i class="fab fa-twitter p-2 text-white rounded"></i>
                            <i class="fab fa-linkedin-in p-2 text-white rounded"></i>
                            <i class="fab fa-pinterest p-2 text-white rounded"></i>
                            <i class="fab fa-whatsapp p-2 text-white rounded"></i>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-widgets ml-lg-5">
                        {{-- <form class="mt-sm-3">
                            <div class="border row align-items-center blog-searchbar mx-1 mb-2">

                                <!--end of col-->
                                <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless" type="search"
                                        placeholder="Search ">
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-search search-icon"></i>
                                </div>
                                <!--end of col-->

                                <!--end of col-->
                            </div>
                        </form> --}}
                        <h2 class="font-weight-bold my-3">Categories</h2>
                        @php
                            $fCategories=DB::table('categories')->get();
                        @endphp
                        @foreach ($fCategories as $fCategory)
                            <div class="blog-category my-2 ">
                            
                            
                                <div class="float-left">
                                    <a  href="{{route('search.category',$fCategory->id)}}" ><h6>{{$fCategory->title}}</h6></a>
                                </div>

                                <div class="float-right">
                                    @php
                                        $count = DB::table('blogs')->where('category_id', '=', $fCategory->id)->count();
                                        
                                    @endphp
                                    <h6>{{$count}}</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach

                        <div class="recent-blog">
                            <h2 class="font-weight-bold mb-3">Recent Blog</h2>
                            @php
                                $fBlogs=DB::table('blogs')->orderBy('created_at', 'DESC')->limit(4)->get();
                            @endphp
                            @foreach ($fBlogs as $fBlog)
                                <div class="row mt-2">
                                    <div class="col-4 pr-0">
                                        <a href="{{route('blog.single-blog',$fBlog->id)}}" target="_blank">
                                            <div class="recent-blog-image">
                                                <img src="{{asset('public/assets/images/blogs/'.$fBlog->image)}}"
                                                    alt="recent-blog-img" />
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col-8 ">
                                        <div class="recent-blog-text">
                                            <a href="{{route('blog.single-blog',$fBlog->id)}}" target="_blank">
                                                <h6 class="mb-0">{{$fBlog->title?$fBlog->title:' '}}</h6>
                                            </a>
                                            <p>{{$fBlog->created_at?date('d M, Y', strtotime($fBlog->created_at)):''}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach     
                        </div>

                    </div>

                </div>
            </div>
            <div class="row ">
                <div class="col-lg-6 offset-lg-1 mt-1">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif 

                    <div class="comment-section mt-4">
                        @php
                            $count = DB::table('comments')->where('blog_id', '=', $sblog->id)->where('status', '=', 1)->count();  
                        @endphp
                        <h5>comments ({{$count}})</h5>
                       
                        <form method="POST" action="{{route('blog.comment',$sblog->id)}}">
                            @csrf
                            <div class="card py-3 comment-card border-0">
                                <h4>Post a Commment</h4>
                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="6"
                                    placeholder="Your comment"></textarea>
                                    <div class="float-left mt-4 mb-3">
                                        <button class="btn btn-primary blog-submit-btn " type="submit">SUBMIT</button>
                                        <div class="clearfix"></div>
                                    </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $fComments=DB::table('comments')
                            ->join('users as ur','comments.user_id','ur.id')
                            ->select(
                                'comments.*',
                                'ur.username', 
                            )
                            ->where('comments.blog_id', '=', $sblog->id)
                            ->where('comments.status', '=', 1)
                            ->get();
                @endphp
                <div class="col-lg-6 offset-lg-1 mt-1">
                    @foreach ($fComments as $fComment)
                        <div class="card mt-2">
                            <div class="card-body">
                            <h5 class="card-title">{{$fComment?$fComment->username:''}}</h5>
                            <p class="card-text">{{$fComment?$fComment->comment:''}}</p>
                            </div>
                       </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Section How it Work End-->
@endsection