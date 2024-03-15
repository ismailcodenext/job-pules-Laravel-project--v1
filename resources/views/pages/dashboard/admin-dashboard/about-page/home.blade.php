@extends('layout.sidenav-layout')
@section('title','About Section')
@section('content')
@include('components.dashboard.back-end.admin.about-section.About-Home-page.about-create')
@include('components.dashboard.back-end.admin.about-section.About-Home-page.about-list')
@include('components.dashboard.back-end.admin.about-section.About-Home-page.about-update')
@include('components.dashboard.back-end.admin.about-section.About-Home-page.about-delete')
@endsection