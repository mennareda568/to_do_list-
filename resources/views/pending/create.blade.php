@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="{{route('savepending')}}" method="post" >
            @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">        

                <label>{{'TITLE'}}</label>
                <input type="text" name="title" class="form-control mb-4" >
                @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{'CONTENT'}}</label>
                <input type="text" name="content" class="form-control mb-4" >
                @error('content')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{'DATE'}}</label>
                <input type="date" name="date" class="form-control mb-4" >
                @error('date')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" value='{{'CREATE TASK'}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
