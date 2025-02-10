@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form class="mt-5" enctype="multipart/form-data" action="{{ route('passuser') }}" method="post">
                    @csrf 
                    <input type="hidden" name="old_id" value="{{ Auth::user()->id }}">

                    <label>{{'PASSWORD'}}</label>
                    <br>
                    <input type="password" name="password" class="form-control mb-4">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="submit" value='{{'UPDATE'}}' class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
@endsection