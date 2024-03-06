@extends('layout.sidenav-layout')
@section('title','Role Permission')
@section('content')
    @include('components.dashboard.back-end.admin.role.role-list')
    @include('components.dashboard.back-end.admin.role.role-create')
    @include('components.dashboard.back-end.admin.role.role-delete')
    @include('components.dashboard.back-end.admin.role.role-update')

@endsection
