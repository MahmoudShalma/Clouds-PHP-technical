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
@include('partials.includes._flash_message')

<div class="row">
    <div class="col-12">
    @if(Auth()->user()->type!="admin")
        <a class="form-control btn btn-default btn-info" href="{{ route('dashboard.invoice',Auth()->id()) }}">@lang('dashboard.invoice')</a>
    @endif    
    </div>
</div>


@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
@endsection