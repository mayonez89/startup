@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>YOUR PROFILE</h2>
                        <h3>{{$user->name}}</h3>

                        <h3>Your interests: </h3>
                        @foreach($user->interests as $interest)
                            <div>{{$interest->name}}</div>
                        @endforeach
                        @if(count($user->interests)==0)
                            <div>You haven't chosen any interests for now.</div>
                            <a href="/edit-profile">Click here to add some interests!</a>
                        @endif

                        <br>
                        <br>
                        <a href="/edit-profile">Edit my profile.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
