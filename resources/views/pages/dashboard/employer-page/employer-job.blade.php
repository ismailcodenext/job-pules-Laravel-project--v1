@extends('layout.employer')
@section('content')
    @include('components.dashboard.back-end.employer.employer-job.employer-job-list')
    @include('components.dashboard.back-end.employer.employer-job.employer-job-create')
    @include('components.dashboard.back-end.employer.employer-job.employer-job-view')
@endsection
