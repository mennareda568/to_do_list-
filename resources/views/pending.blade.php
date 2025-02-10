@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 m-auto ">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            {{ 'PENDING TASKS' }}
                            <div>
                                <a href="{{ route('finishall') }}" class="btn btn-success">Complete All Tasks</a>
                                <a href="{{ route('delete-selected') }}" class="btn btn-danger">Delete All Tasks</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        @if (session('message'))
                            <h4 class="alert alert-success mt-2">{{ session('message') }}</h4>
                        @endif
                        <table class="table table-dark ">
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
                                            <a href="{{ route('editpending', $item->id) }}" class="btn btn-primary"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('deletepending', $item->id) }}" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>
                                            <a href="{{ route('finishtask', $item->id) }}" class="btn btn-warning"><i
                                                    class="fa-solid fa-check"></i></a>
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
