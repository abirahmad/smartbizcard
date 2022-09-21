@extends('layouts.frontend-master')
@section('meta-name')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="all-blogs-section">
    <div class="content-fluid">
        {{-- <iframe src="{{asset('public/docs/privacy.docx')}}" height="1000px" width="800px"></iframe> --}}
        <iframe src="{{asset('public/docs/privacy.pdf')}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
    </div>
</div>
@endsection