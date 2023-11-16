@extends('layouts.dashboard.app')
@section('title') @lang('dashboard.add') @lang('dashboard.plan') @endsection

@section('css')

@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') @lang('dashboard.add') @lang('dashboard.plan') @endslot
@slot('pagetitle') @lang('dashboard.plan') @endslot
@endcomponent
@include('partials.includes._flash_message')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="outer-repeater needs-validation" method="POST" action="{{ route('dashboard.planes.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formname">@lang('dashboard.name') :</label>
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="@lang('dashboard.name')" required>
                                <div class="valid-feedback">
                                    @lang('dashboard.valid-feedback')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('dashboard.invalid-feedback')
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formname">@lang('dashboard.price') :</label>
                                <input type="number" class="form-control" value="{{old('price')}}" name="price" placeholder="@lang('dashboard.price')" required>
                                <div class="valid-feedback">
                                    @lang('dashboard.valid-feedback')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('dashboard.invalid-feedback')
                                </div>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('dashboard.Submit')</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection

@section('script')

@endsection