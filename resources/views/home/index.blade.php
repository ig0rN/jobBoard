@extends('layouts.app')

@section('title')
    Job Board
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="slova col-md-8 text-center">
            <h2>Welcome to Job Board Application.<br>Here you can find all jobs</h2>    
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        @foreach($jobs as $job)
        <div class="col-md-8 mt-4">
            <div class="card">

                <div class="card-header text-center">
                    <strong>
                        <a href="{{ route('show-job', $job->id) }}">
                            {{ $job->title }}
                        </a>
                    </strong>
                </div>

                <div class="card-body text-center"> 
                    {!! $job->description !!}
                </div>

                <div class="card-footer clearfix">
                    <div class="float-left">
                        Created By: <br>
                        {{ $job->user->name }}
                    </div>
                    <div class="float-right">
                        Created At: <br>
                        {{ date('d/m/Y H:i', strtotime($job->created_at)) }}
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-5">
        {{ $jobs->render() }}
    </div>
</div>
@endsection