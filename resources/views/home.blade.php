@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if (session('message'))
            <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
        @endif
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="{{ route('tasks') }}">
                                {{ 'COMPLETED TASKS' }}
                            </a>
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                    </div>
                    <div class="card-body text-center ">
                        {{ $counttask }}
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="{{ route('pending') }}">
                                {{ 'PENDING TASKS' }}
                            </a>
                            <i class="fa-solid fa-clock"></i>
                        </div>
                    </div>
                    <div class="card-body text-center ">
                        {{ $countpending }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
