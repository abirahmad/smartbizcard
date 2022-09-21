@extends('layouts.frontend-master')

@section('content')
    <div class="all-blogs-section">
        <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6 offset-lg-1 col-md-6  col-sm-12">
                @foreach ($blogs as $blog)
                    <div class="row mt-lg-2 mt-lg-1">
                        <div class="col-lg-4 col-md-12">
                            <a href="{{route('blog.single-blog',$blog->id)}}" target="_blank">
                                <div class="all-blog-image">
                                    <img src="{{$blog->image? asset('public/assets/images/blogs/'.$blog->image): '' }}" alt="recent-blog-img" />
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-8 ">
                            <div class="recent-blog-text pt-3">
                                <a href="{{route('blog.single-blog',$blog->id)}}" target="_blank">
                                    <h6 class="font-weight-bold all-blogs-title">{{$blog->title?$blog->title:''}}</h6>
                                </a>
                                @php
                                    $removePhp = strip_tags($blog->description);
                                @endphp
                                <p >{!! Str::limit($removePhp, 110)  !!}</p>
                                <span class="badge badge-pill badge-primary py-2 px-3 blog-badge-one">{{ $blog->created_at? date('d, M Y', strtotime($blog->created_at)): ''}}</span>
                                <span class="badge badge-pill badge-primary py-2 px-3 blog-badge ml-2"><i
                                        class="fas fa-tag mr-1"></i> {{ $blog->cateTitle?$blog->cateTitle:'' }}</span>
                                {{-- <p>10 Mar, 2021</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-widgets ml-lg-5 mb-5 ">
                    <form method="get" action="{{route('blog.search')}}" class="mt-sm-3 ">
                       
                        <div class="border row align-items-center blog-searchbar mx-1 mb-2 ">

                            <!--end of col-->
                            <div class="col">
                                <input name="search" class="form-control form-control-lg form-control-borderless" type="search"
                                    placeholder="Search ">
                            </div>
                            <div class="col-auto">
                                <a type="submit" ><i class="fas fa-search search-icon"></i></a>
                            </div>
                            <!--end of col-->

                            <!--end of col-->
                        </div>
                    </form>
                    <h2 class="font-weight-bold my-3">Categories</h2>
                 
                    @php
                        $fCategories=DB::table('categories')->where('active','1')->get();
                    @endphp
                    @foreach ($fCategories as $fCategory)
                        <div class="mt-3 all-blogs-categories">
                            <div class="float-left">
                                <a  href="{{route('search.category',$fCategory->id)}}" ><h6>{{$fCategory->title?$fCategory->title:''}}</h6></a>
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
                    
                </div>
            </div>
            <div class="col-lg-3 offset-lg-10">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {!! $blogs->links('pagination::bootstrap-4') !!}
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
</div>
@endsection
