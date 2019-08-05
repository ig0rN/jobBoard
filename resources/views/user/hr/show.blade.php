@extends('layouts.app')

@section('title')
    Job Details
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header clearfix text-center">
                    <div class="float-left">
                        <a href="{{ route('hr.home') }}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                    <br>

                    Job Title: <strong>{{ $job->title }}</strong>
                    <br>
                    Email: <strong>{{ $job->email }}</strong>
                    <br>
                    Status: <strong>{{ $job->getStatus($job->status) }}</strong>
                </div>

                <div class="card-body text-center"> 
                    {!! $job->description !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection