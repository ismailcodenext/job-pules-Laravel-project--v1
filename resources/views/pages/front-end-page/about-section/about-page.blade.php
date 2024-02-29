@extends('layout.master')
@section('title','About Section')
@section('content')
    @include('components.front-end.components.navbar')
    @include('components.front-end.page.about-section.about')
    @include('components.front-end.components.footer')
@endsection
