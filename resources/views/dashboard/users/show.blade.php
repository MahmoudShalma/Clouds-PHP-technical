@extends('layouts.dashboard.app')
@section('title') @lang('dashboard.show') @lang('dashboard.client') @endsection

@section('css')


@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') @lang('dashboard.show') @lang('dashboard.client') @endslot
@slot('pagetitle') @lang('dashboard.clients') @endslot
@endcomponent

@include('partials.includes._flash_message')

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <form method="POST" action="{{ route('dashboard.users.destroy', $user->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-info btn-sm shadow-lg rounded-0 ml-1 mr-1"><i class="fa fa-pen text-white"> </i> {{trans("dashboard.edit")}}</a>
                    <a href="{{ route('dashboard.users.change_status', $user->id) }}" class="btn btn-info btn-sm shadow-lg rounded-0 ml-1 mr-1"><i class="fa fa-pen text-white"> </i> @if(($user->status != "activate")) {{trans("dashboard.activate")}} @else {{trans("dashboard.deactivate")}} @endif</a>
                    <a href="" class="btn btn-info btn-sm shadow-lg confirm_delete rounded-0 ml-1 mr-1"><i class="fa fa-times-circle"> </i> {{trans("dashboard.delete")}}</a>
                </form>               

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for="note">@lang('dashboard.name')</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for="note">@lang('dashboard.email')</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for="note">@lang('dashboard.plane')</label>
                            <input type="text" class="form-control" value="{{ $user->customerPlane->plane->name }}" disabled>
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