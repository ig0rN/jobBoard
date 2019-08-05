@extends('layouts.app')

@section('title')
    Add New Job
@endsection


@section('content')
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">Add New Job</div>
        
                        <div class="card-body">
                        <form method="POST" action="{{ route('hr.create-job') }}" enctype="multipart/form-data">
                                @csrf
        
                                <div class="form-group row justify-content-center">
                                    <label for="title" class="col-md-4 col-form-label text-center">Job Title</label><br>
        
                                    <div class="col-md-12">
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <label for="email" class="col-md-4 col-form-label text-center">Email</label><br>
        
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <label for="description" class="col-md-4 col-form-label text-center">Job description</label><br>
    
                                    <div class="col-md-12">
                                        <textarea id="description" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0 justify-content-center">
                                        <button type="submit" class="btn btn-warning">
                                            Add New Job
                                        </button>
                                </div>

                                <div class="form-group row mt-4 justify-content-center">
                                    <div class="col-md-6 text-center">
                                        @include('errors')
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

@section('script')
    {{-- Tiny MCE input --}}
    <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('plugins/tinymce/tinymce.run.js?ver=' . time()) }}"></script>
@endsection
