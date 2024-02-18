@extends('frontend.layouts.master')
@section('content');
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            @foreach($event as $r)
                <div class="form-group">
                    <label for="first name">{{$r->name}}</label>
                    <input type="text" name="first name" class="form-control"
                           id="first name"
                           value="{{ old('first name', '#FFFFFF') }}">
                    @error('first name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="first name">{{$r->name}}</label>
                    <input type="text" name="first name" class="form-control"
                           id="first name"
                           value="{{ old('first name', '#FFFFFF') }}">
                    @error('first name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
