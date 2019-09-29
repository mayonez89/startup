@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Search results for: {{$search}}</h2>
                        <div>
                            <div>
                                <span>Interests: </span>
                                    {{ $seach }},
                                <span>Teaching: </span>
                                    {{$search}},
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
