@extends('layout.sidenav-layout')
@section('content')
    @include('components.dashboard.back-end.admin.companies.companies-list')
    @include('components.dashboard.back-end.admin.companies.companies-view')
    @include('components.dashboard.back-end.admin.companies.companies-delete')
@endsection
