@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Instagram Look <a href="{{ url('admin/instagram') }}" class="btn btn-primary btn-sm float-end text-white">Back</a></h4>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/instagram') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Select Product</label>
                <select name="product_id" class="form-control" required>
                    <option value="">-- Select Product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Lifestyle Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Instagram Post Link (Optional)</label>
                <input type="url" name="insta_link" class="form-control" placeholder="https://instagram.com/p/...">
            </div>
            <div class="mb-3">
                <label>Status (Hidden)</label>
                <input type="checkbox" name="status" style="width:20px; height:20px;">
            </div>
            <button type="submit" class="btn btn-primary text-white">Save Look</button>
        </form>
    </div>
</div>
@endsection