@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h4 class="mb-0">Banner Settings</h4>
        <a href="{{ route('admin.banners.edit') }}" class="btn btn-light btn-sm">
            {{ $banner->exists ? 'Edit Banner' : 'Create Banner' }}
        </a>
    </div>
    <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if($banner && $banner->exists)
            <div class="row">
                <div class="col-md-4">
                    <label>Current Image:</label>
                    @if($banner->image)
                        <img src="{{ asset($banner->image) }}" class="img-fluid border rounded" style="max-height: 200px; object-fit: cover;">
                    @else
                        <div class="p-4 bg-light text-center border">No image set</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h5><strong>Title:</strong> {{ $banner->title ?? 'N/A' }}</h5>
                    <p><strong>Subtitle:</strong> {{ $banner->subtitle ?? 'N/A' }}</p>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted">No banner has been created yet.</p>
                <a href="{{ route('admin.banners.edit') }}" class="btn btn-primary">Create Your First Banner</a>
            </div>
        @endif
    </div>
</div>
@endsection