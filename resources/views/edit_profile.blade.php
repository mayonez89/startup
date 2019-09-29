@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <h1>EDIT PROFILE</h1>
                    <div>
                        <h3>Your interests</h3>
                        <div class="test-click">(start typing and select from dropdown list)</div>
            {{--            <select>--}}
            {{--                <option value="1">1</option>--}}
            {{--                <option value="2">2</option>--}}
            {{--            </select>--}}
                        <input type="text" list="cars" id="interest-list"/>
                        <datalist id="cars">
                            @foreach($interests as $interest)
                                <option name="{{$interest->name}}">{{$interest->name}}</option>
                            @endforeach
            {{--                @foreach($interests as $interest --}}
            {{--                                              <option>Volvo</option>--}}
            {{--                @endforeach--}}
            {{--                <option>Saab</option>--}}
            {{--                <option>Mercedes</option>--}}
            {{--                <option>Audi</option>--}}
                        </datalist>

                        <h5>
                            Selected interests:
                        </h5>
                        <div id="my-interests">
                            @foreach($user->interests as $interest)
                                <div id="rm-{{$interest->id}}">
                                    {{$interest->name}}<div class="remove-interest" id="{{$interest->id}}">X</div>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button id="update-profile">UPDATE PROFILE</button>
                        </div>

                        <br>
                        <br>
                        <a href="/my-profile">Get me back to my profile.</a>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


@endsection
