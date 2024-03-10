@extends('layout.sidenav-layout')
@section('title','Companie Heading Section')
@section('content')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-heading.heading-create')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-heading.heading-list')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-heading.heading-update')
@include('components.dashboard.back-end.admin.home-section.companie-page.companie-heading.heading-delete')
@endsection