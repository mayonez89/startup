@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <h2>Current users count: {{$cnt}}</h2>
                        <span>...and still counting!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
