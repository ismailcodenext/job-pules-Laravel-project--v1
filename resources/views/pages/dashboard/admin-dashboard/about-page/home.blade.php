@extends('layout.sidenav-layout')
@section('title','Companie History Section')
@section('content')
@include('components.dashboard.back-end.admin.about-section.companie-history-page.history-create')
@include('components.dashboard.back-end.admin.about-section.companie-history-page.history-list')
@include('components.dashboard.back-end.admin.about-section.companie-history-page.history-update')
@include('components.dashboard.back-end.admin.about-section.companie-history-page.history-delete')
@endsection