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
                        <a href="{{ route('index') }}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                    <br>

                    <strong>{{ $job->title }}</strong>
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