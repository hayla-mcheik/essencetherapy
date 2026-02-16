@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white mb-0">Manage About Us</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $about->title }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="10">{{ $about->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary text-white">Update Content</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection