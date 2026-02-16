@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">{{ $banner->exists ? 'Edit Banner' : 'Create Banner' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.banners.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="form-control" placeholder="e.g. The Pearl Collection">
                <small class="text-muted">You can use <br> for line breaks</small>
            </div>
            
            <div class="mb-3">
                <label>Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}" class="form-control" placeholder="e.g. New Arrivals">
            </div>
            
            <div class="mb-3">
                <label>Upload New Image</label>
                @if($banner->image)
                    <div class="mb-2">
                        <img src="{{ asset($banner->image) }}" style="max-height: 100px; object-fit: cover;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
                <small class="text-muted">Recommended size: 800x1200px (portrait orientation)</small>
            </div>
            
            <button type="submit" class="btn btn-primary text-white">
                {{ $banner->exists ? 'Update Banner' : 'Create Banner' }}
            </button>
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection