@extends('layout.candidate')
@section('title','Candidate Profile')
@section('content')
    @include('components.dashboard.back-end.candidate.candidate-list')
    @include('components.dashboard.back-end.candidate.candidate-profile')
@endsection
