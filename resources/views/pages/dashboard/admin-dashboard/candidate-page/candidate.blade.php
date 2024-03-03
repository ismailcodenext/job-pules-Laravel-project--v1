@extends('layout.sidenav-layout')
@section('title','Candidate')
@section('content')
    @include('components.dashboard.back-end.admin.candidate.candidate-list')
    @include('components.dashboard.back-end.admin.candidate.candidate-view')
    @include('components.dashboard.back-end.admin.candidate.candidate-delete')
@endsection
