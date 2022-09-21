@extends('layouts.master')
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
@section('content')
    <div class="content-wrapper ">
        <div class="container-fluid  pt-3 ">
            <div class="user-panel">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5  col-md-6 col-12 ">
                            <div class="ml-lg-3">
                                <h5 class="font-weight-bold card-edit-title ml-lg-4 mb-3 mt-2">Manage VCard Test</h5>
                                @include('layouts.partials.messages')
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{-- <h5 class="font-weight-bold card-edit-title ml-4"><i class="fas fa-chevron-left mr-3"></i>Edit</h5> --}}
                                @if (!is_null($vcards))
                                    <div class="card px-3 user-card y-scroll">
                                        <form action="{{ route('vcard.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body p-3">
                                                <div class="float-left">
                                                    <h5 class="card-title col-md-12 font-weight-bold user-card-title">Card
                                                        Color
                                                    </h5>
                                                </div>
                                                <div class="float-right">
                                                    <input type="color" name="color" class="rounded-circle color-input"
                                                        value="{{ $vcards->color !== '' ? $vcards->color : null }}">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="col-md-12 user-panel-input pt-0 mt-0">
                                                <div class="d-block" style="margin-top: -16px">
                                                    <span><label for="main_image"
                                                            class="form-group user-panel-level font-weight-bold">
                                                            Banner</label></span>
                                                    {{-- <input type="file" name="main_image" data-default-file="{{asset('public/backend/images/vcard/images/'.$vcards->main_image)}}" class="form-control dropify" data-height="55"  /> --}}
                                                    <input type="file" class="form-control dropify" data-height="55"
                                                        data-allowed-file-extensions="png jpg jpeg webp" id="main_image"
                                                        name="main_image"
                                                        data-default-file="{{ asset('public/backend/images/vcard/images/' . $vcards->main_image) }}" />
                                                    {{-- <button type="submit" class="btn btn-primary upload-btn">upload</button> --}}
                                                </div>
                                                <span><label for="cover_image"
                                                        class="form-group  user-panel-level font-weight-bold mt-0"> Profile
                                                        Image</label></span>
                                                <div class="d-flex flex-row">
                                                    <div class="custom-dropify">
                                                        <input type="file" name="cover_image"
                                                            data-default-file="{{ $vcards->cover_image != null ? asset('public/backend/images/vcard/images/' . $vcards->cover_image) : null }}"
                                                            class="form-control dropify  rounded" data-height="55" />
                                                    </div>
                                                    {{-- <button type="submit"class="btn btn-primary upload-btn profile-btn  ml-2">upload</button> --}}

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <span><label for="full_name" class="form-group  user-panel-level ">Full
                                                    Name</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->full_name !== null ? $vcards->full_name : null }}"
                                                name="full_name" placeholder="Type" />

                                            <span><label for="title"
                                                    class="form-group user-panel-level">Title</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->title !== null ? $vcards->title : null }}" name="title"
                                                placeholder="Type" />
                                            <span><label for="slug" class="form-group user-panel-level">Shot
                                                    Url</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->slug !== null ? $vcards->slug : null }}" name="slug"
                                                placeholder="Type" />
                                            <p class="input-bottom-text">Use only alphanumeric value without space.
                                                (Hyphen(-) <br>allow). Slug will be used for card url.</p>
                                            <span><label for="company"
                                                    class="form-group user-panel-level">Company</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->company !== null ? $vcards->company : null }}"
                                                name="company" placeholder="Type" />

                                            <span><label for="description" class="form-group user-panel-level">
                                                    Description</label></span>
                                            <textArea type="text" class="form-control user-panel-input" name="description"
                                                placeholder="Type">{{ $vcards->description !== null ? $vcards->description : null }}</textArea>
                                            <span><label for="email" class="form-group user-panel-level"
                                                    placeholder="Type">Email</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->email !== null ? $vcards->email : null }}"
                                                name="email" placeholder="Type" />
                                            <span><label for="phone" class="form-group user-panel-level">Phone
                                                    (home)</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->phone !== null ? $vcards->phone : null }}"
                                                name="phone" placeholder="Type" />
                                            <span><label for="phone_office" class="form-group user-panel-level">Phone
                                                    (office)</label></span>
                                            <input type="text" class="form-control user-panel-input"
                                                value="{{ $vcards->phone_office !== null ? $vcards->phone_office : null }}"
                                                name="phone_office" placeholder="Type" />
                                            <br>
                                            <div id="socialInput"> <input type="hidden" name="social_input" /> </div>

                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success save-btn">save</button>

                                                {{-- <a href="{{ route('vcard.generate', $vcards->slug,$user->username) }}"
                                                class="btn btn-primary save-btn" target="_blank">Generate</a> --}}
                                                <a href="{{ url('smart-vcard/' . $user->username . '/' . $vcards->slug) }}"
                                                    class="btn btn-primary save-btn" target="_blank">Generate</a>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="card px-3 user-card scroll">
                                        <form action="{{ route('vcard.store') }}" method="POST"
                                            enctype="multipart/form-data" id="myform">
                                            @csrf
                                            <div class="card-body">
                                                <div class="float-left">
                                                    <h5 class="card-title col-md-12 font-weight-bold user-card-title">Card
                                                        Color
                                                    </h5>
                                                </div>
                                                <div class="float-right">
                                                    <input type="color" name="color" class="rounded-circle color-input">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="col-md-12 user-panel-input">
                                                <div class="d-block">
                                                    <span><label for="main_image"
                                                            class="form-group user-panel-level font-weight-bold">
                                                            Banner</label></span>
                                                    <input type="file" name="main_image" class="form-control dropify"
                                                        data-height="55" />
                                                    {{-- <button type="submit" class="btn btn-primary upload-btn">upload</button> --}}
                                                </div>
                                                <span><label for="cover_image"
                                                        class="form-group  user-panel-level font-weight-bold mt-0"> Profile
                                                        Image</label></span>
                                                <div class="d-flex flex-row">
                                                    <div class="custom-dropify">
                                                        <input type="file" name="cover_image"
                                                            class="form-control dropify  rounded" data-height="55" />
                                                    </div>
                                                    {{-- <button type="submit"
                                                    class="btn btn-primary upload-btn profile-btn  ml-2">upload</button> --}}

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <span>
                                                <label for="full_name" class="form-group  user-panel-level ">Full
                                                    Name</label>
                                            </span>
                                            <input type="text" class="form-control user-panel-input" name="full_name"
                                                placeholder="Type" />

                                            <span><label for="title"
                                                    class="form-group user-panel-level">Title</label></span>
                                            <input type="text" class="form-control user-panel-input" name="title"
                                                placeholder="Type" />
                                            <span><label for="slug" class="form-group user-panel-level">Shot
                                                    Url</label></span>
                                            <input type="text" class="form-control user-panel-input" name="slug"
                                                placeholder="Type" />
                                            <span><label for="company"
                                                    class="form-group user-panel-level">Company</label></span>
                                            <input type="text" class="form-control user-panel-input" name="company"
                                                placeholder="Type" />

                                            <span><label for="description" class="form-group user-panel-level">
                                                    Description</label></span>
                                            <textArea type="text" class="form-control user-panel-input" name="description"
                                                placeholder="Type"></textArea>
                                            <span><label for="email" class="form-group user-panel-level"
                                                    placeholder="Type">Email</label></span>
                                            <input type="text" class="form-control user-panel-input" name="email"
                                                placeholder="Type" />
                                            <span><label for="phone" class="form-group user-panel-level">Phone
                                                    (home)</label></span>
                                            <input type="text" class="form-control user-panel-input" name="phone"
                                                placeholder="Type" />

                                            <span><label for="phone_office" class="form-group user-panel-level">Phone
                                                    (office)</label></span>
                                            <input type="text" class="form-control user-panel-input" name="phone_office"
                                                placeholder="Type" />
                                            <br>
                                            <div id="socialInput"></div>

                                            <div id="socialInputSystem"></div>

                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success save-btn">save</button>

                                                <a href="{{ url('smart-vcard/' . $user->username . '/' . $user->username) }}"
                                                    class="btn btn-primary save-btn" target="_blank">Generate</a>
                                            </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div id="VCardSocial"></div>
                    </div>
                </div>
            </div>

            </section>

        @endsection
        <script src="{{ asset('public/js/app.js') }}"></script>
