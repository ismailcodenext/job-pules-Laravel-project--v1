@extends('layout.sidenav-layout')
@section('title','Role Permission')
@section('content')
    @include('components.dashboard.back-end.admin.permission.permission-list')
    @include('components.dashboard.back-end.admin.permission.permission-create')
    @include('components.dashboard.back-end.admin.permission.permission-delete')
    @include('components.dashboard.back-end.admin.permission.permission-update')
@endsection
