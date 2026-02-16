@extends('layouts.app')
@section('title','Thank Your for Shopping')

@section('content')

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(session ('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                <h4>Thank Your for Shopping with Taly's Collection</h4>
                <a href="{{ url('/') }}" class="btn btn-promocode-apply">Go To Home Page</a>
</div>
</div>
</div>
</div>
</div>

@endsection