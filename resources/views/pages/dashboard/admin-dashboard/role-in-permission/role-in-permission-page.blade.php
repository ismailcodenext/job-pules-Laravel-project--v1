@extends('layout.sidenav-layout')
@section('title','Role Permission')
@section('content')
    @include('components.dashboard.back-end.admin.role-in-permission.role-in-permission-create')
    @include('components.dashboard.back-end.admin.role-in-permission.role-in-permission-list')


@endsection
