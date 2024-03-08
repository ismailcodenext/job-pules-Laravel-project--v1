@extends('layout.sidenav-layout')
@section('title','Home Section')
@section('content')
@include('components.dashboard.back-end.admin.home-section.hero-page.hero-create')
@include('components.dashboard.back-end.admin.home-section.hero-page.hero-list')
@include('components.dashboard.back-end.admin.home-section.hero-page.hero-update')
@include('components.dashboard.back-end.admin.home-section.hero-page.hero-delete')
@endsection