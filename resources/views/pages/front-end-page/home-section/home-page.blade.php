@extends('layout.master')
@section('title','Home Section')
@section('content')
    @include('components.front-end.components.navbar')
    @include('components.front-end.page.home-section.home')
    {{-- @include('components.front-end.page.home-section.companie-model') --}}
    @include('components.front-end.components.footer')
@endsection
