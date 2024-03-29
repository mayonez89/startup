@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/my-profile">See your profile</a><br/>
                    <a href="/edit-profile">Edit your profile info</a><br>
                    <a href="/schedule">See your schedule</a><br>
                    <br>
                    <a href="/activities">ACTIVITIES!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
