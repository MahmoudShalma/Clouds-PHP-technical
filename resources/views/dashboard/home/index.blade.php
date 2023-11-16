@extends('layouts.dashboard.app')
@section('title')
    @lang('dashboard.home')
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('title')
            @lang('dashboard.dashboard')
        @endslot
        @slot('pagetitle')
            @lang('dashboard.home')
        @endslot
    @endcomponent

  
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> 
@endsection
