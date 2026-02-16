@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white"><h4>Manage Top Ticker Text</h4></div>
    <div class="card-body">
        
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form action="{{ route('admin.tickers.store') }}" method="POST" class="mb-5 p-3 border rounded bg-light">
            @csrf
            <label><strong>Add a New Ticker Message:</strong></label>
            <div class="input-group">
                <input type="text" name="content" class="form-control" placeholder="✨ Enter your message here..." required>
                <button type="submit" class="btn btn-primary">Add Line</button>
            </div>
        </form>

        <hr>

        <label><strong>Current Messages:</strong></label>
        @foreach($tickers as $ticker)
            <form action="{{ route('admin.tickers.update', $ticker->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <input type="text" name="content" value="{{ $ticker->content }}" class="form-control">
                    <button type="submit" class="btn btn-success">Update Line {{ $loop->iteration }}</button>
                </div>
            </form>
        @endforeach

        @if($tickers->isEmpty())
            <p class="text-center text-muted">No ticker messages found. Use the form above to add one.</p>
        @endif
    </div>
</div>
@endsection