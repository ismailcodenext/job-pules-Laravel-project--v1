@extends('layout.master')
@section('title','Jon Section')
@section('content')
    @include('components.front-end.components.navbar')
    @include('components.front-end.page.job-section.job')
    @include('components.front-end.components.footer')
@endsection
