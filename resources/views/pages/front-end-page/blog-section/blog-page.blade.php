@extends('layout.master')
@section('title','Blog Section')
@section('content')
    @include('components.front-end.components.navbar')
    @include('components.front-end.page.blog-section.blog')
    @include('components.front-end.components.footer')
@endsection
