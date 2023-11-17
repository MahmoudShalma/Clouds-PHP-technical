@extends('layouts.dashboard.app')
@section('title') @lang('dashboard.show') @lang('dashboard.plane') @endsection

@section('css')


@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') @lang('dashboard.show') @lang('dashboard.plane') @endslot
@slot('pagetitle') @lang('dashboard.planes') @endslot
@endcomponent

@include('partials.includes._flash_message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
  
                <div class="card-body">
  
                    <div class="alert alert-success">
                        Subscription purchase successfully!
                    </div>
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection