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

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <form method="POST" action="{{ route('dashboard.planes.destroy', $plan->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('dashboard.planes.edit', $plan->id) }}" class="btn btn-info btn-sm shadow-lg rounded-0 ml-1 mr-1"><i class="fa fa-pen text-white"> </i> {{trans("dashboard.edit")}}</a>
                    <a href="" class="btn btn-info btn-sm shadow-lg confirm_delete rounded-0 ml-1 mr-1"><i class="fa fa-times-circle"> </i> {{trans("dashboard.delete")}}</a>
                </form>               

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label for="note">@lang('dashboard.name')</label>
                            <input type="text" class="form-control" value="{{ $plan->name }}" disabled>
                        </div>
                    </div>
                   
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label for="note">@lang('dashboard.price')</label>
                            <input type="text" class="form-control" value="{{ $plan->price }}" disabled>
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection

@section('script')


@endsection