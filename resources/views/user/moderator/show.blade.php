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
                        <a href="{!! URL::previous() !!}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="float-right">
                        @if($job->isDeclined() || !$job->isPublished())
                        <form id="approve-job{{ $job->id }}" action="{{ route('moderator.approve-job', $job->id) }}" method="POST">
                            @csrf
                        </form>
                        <a href="{{ route('moderator.approve-job', $job->id) }}">
                            <i class="text-success fa fa-check" 
                            onclick="event.preventDefault();
                            if( confirm('Are you sure?') ){
                                document.getElementById('approve-job'+{{ $job->id }}).submit();
                            }"></i>
                        </a>
                        @endif

                        @if($job->isApproved() || !$job->isPublished())
                        <form id="decline-job{{ $job->id }}" action="{{ route('moderator.decline-job', $job->id) }}" method="POST">
                            @csrf
                        </form>
                        <a href="{{ route('moderator.decline-job', $job->id) }}">
                            <i class="text-danger fa fa-times" 
                            onclick="event.preventDefault();
                            if( confirm('Are you sure?') ){
                                document.getElementById('decline-job'+{{ $job->id }}).submit();
                            }"></i>
                        </a>
                        @endif
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
    </div>
</div>
@endsection