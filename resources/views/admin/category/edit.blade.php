@extends('layouts.admin-layout')
@section('content')

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" >
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" >
           
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" ></textarea>
            @error('description')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" >
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

            @error('status')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection