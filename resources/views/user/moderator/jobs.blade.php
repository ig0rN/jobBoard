@extends('layouts.app')

@section('title')
    Status: {{ $status }} - Moderator page
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">
                    <div class="float-left">
                        <a href="{{ route('moderator.home') }}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                    </div>
                    <br>

                    <strong>Here is all jobs with status: {{ $status }}</strong>
                </div>

                <div class="card-body"> 

                    <table style="text-align:center;" id="project-table" class="table table-responsive-lg table-bordered">
                        <thead style=" color:rgba(198, 77, 7, 0.9);">
                            <tr>
                                <th scope="col">Job Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Email</th>
                                <th scope="col">View</th>
                                <th scope="col">Approve</th>
                                <th scope="col">Decline</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($jobs))
                            @foreach($jobs as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->getStatus($job->status)  }}</td>
                                    <td>{{ $job->email }}</td>
                                    <td>
                                        <a href="{{ route('moderator.show-job', $job->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($job->isDeclined() || !$job->isPublished())
                                            <form id="approve-job{{ $job->id }}" action="{{ route('moderator.approve-job', $job->id) }}" method="POST">
                                                @csrf
                                            </form>
                                            <a href="{{ route('moderator.approve-job', $job->id) }}">
                                                <i class="text-success fa fa-check" 
                                                onclick="event.preventDefault();
                                                if( confirm('Are you sure you want to approve chosen job?') ){
                                                    document.getElementById('approve-job'+{{ $job->id }}).submit();
                                                }"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($job->isApproved() || !$job->isPublished())
                                            <form id="decline-job{{ $job->id }}" action="{{ route('moderator.decline-job', $job->id) }}" method="POST">
                                                @csrf
                                            </form>
                                            <a href="{{ route('moderator.decline-job', $job->id) }}">
                                                <i class="text-danger fa fa-times" 
                                                onclick="event.preventDefault();
                                                if( confirm('Are you sure you want to decline chosen job?') ){
                                                    document.getElementById('decline-job'+{{ $job->id }}).submit();
                                                }"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No jobs yet</td>
                            </tr>
                        @endif
                        </tbody>
        
                    </table>
                        
                </div>

            </div>
        </div>
    </div>
</div>
@endsection