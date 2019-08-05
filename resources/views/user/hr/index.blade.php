@extends('layouts.app')

@section('title')
    HR Home Page
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="slova col-md-8 text-center">

            <h2>Hello {{ auth()->user()->name }}. <br> Welcome to Job Board Application.</h2>
            <a href="{{ route('hr.new-job') }}"><button type="button" class="btn btn-warning mt-4">You want to add new job?</button></a>
    
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center">
                    <strong>Here is all your uploaded jobs</strong>
                </div>

                <div class="card-body"> 

                    <table style="text-align:center;" id="project-table" class="table table-responsive-lg table-bordered">
                        <thead style=" color:rgba(198, 77, 7, 0.9);">
                            <tr>
                                <th scope="col">Job Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Email</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
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
                                        <a href="{{ route('hr.show-job', $job->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form id="delete-job{{ $job->id }}" action="{{ route('hr.delete-job', $job->id) }}" method="POST">
                                            @csrf
                                        </form>
                                        <a href="{{ route('hr.delete-job', $job->id) }}">
                                            <i class="text-danger fa fa-trash" 
                                            onclick="event.preventDefault();
                                            if( confirm('Are you sure?') ){
                                                document.getElementById('delete-job'+{{ $job->id }}).submit();
                                            }"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No jobs yet</td>
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