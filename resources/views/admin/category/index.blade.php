@extends('layouts.admin-layout')
@section('content')

@error('success')
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@enderror
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">Category</h4>
            </div>
            <div>
                <a href="{{route('categories.create')}}" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-clipboard btn-icon-prepend"></i>Add Category</a>
            </div>
        </div>
    </div>
@endsection