@extends('layouts.app')

@section('title')
    Moderator Home Page
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="slova col-md-8 text-center">

            <h2>Hello {{ auth()->user()->name }}. <br> Welcome to Job Board Application.</h2>
    
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">
                    <strong>Here is all jobs filtered by status</strong>
                </div>

                <div class="card-body"> 
                    <div class="row justify-content-center bg-warning">
                        <a href="{{ route('moderator.jobs', 2) }}" class="text-white">
                            Look Jobs that are waiting for approval
                        </a>
                    </div>
                    <div class="row justify-content-center mt-3 bg-success">
                        <a href="{{ route('moderator.jobs', 1) }}" class="text-white">
                            Look Approved Jobs
                        </a>
                    </div>
                    <div class="row justify-content-center mt-3 bg-danger">
                        <a href="{{ route('moderator.jobs', 0) }}" class="text-white">
                            Look Declined Jobs
                        </a>
                    </div>                        
                </div>

            </div>
        </div>
    </div>
</div>
@endsection