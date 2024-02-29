@extends('layout.sidenav-layout')
@section('title','Home Section')
@section('content')
@include('components.dashboard.back-end.home-section.home-page-create')
@include('components.dashboard.back-end.home-section.home-page-list')
@include('components.dashboard.back-end.home-section.home-page-update')
@include('components.dashboard.back-end.home-section.home-page-delete')
@endsection