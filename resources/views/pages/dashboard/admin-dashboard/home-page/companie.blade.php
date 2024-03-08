@extends('layout.sidenav-layout')
@section('title','Companie Section')
@section('content')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-create')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-list')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-update')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-delete')
@endsection