@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto ">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            {{ 'COMPLETED TASKS' }}
                            <a href="{{ route('selectedall') }}" class="btn btn-danger">Delete All Tasks</a>
                        </div>
                    </div>
                    <div class="card-body ">
                        @if (session('message'))
                            <h4 class="alert alert-success mt-2">{{ session('message') }}</h4>
                        @endif

                        <table class="table table-dark mt-3">
                            <thead>
                                <tr>
                                    <td>{{ 'TITLE' }}</td>
                                    <td>{{ 'CONTENT' }}</td>
                                    <td>{{ 'DATE' }}</td>
                                    <td>{{ 'ACTION' }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <a href="{{ route('deletetask', $item->id) }}" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>                                       
                                        </td>                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $result->links() }} <!-- Display pagination links -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
