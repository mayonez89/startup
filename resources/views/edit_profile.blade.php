@extends('layouts.app')

@section('content')
    <div>
        <div>EDIT PROFILE</div>
        <div>
            <div>Your interests</div>
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

            <div>
                Your interests:
            </div>
            <div id="my-interests">
                @foreach($user->interests as $interest)
                    <span id="rm-{{$interest->id}}">
                        {{$interest->name}}<div class="remove-interest" id="{{$interest->id}}">X</div>
                    </span>
                @endforeach
            </div>

            <div>
                <button id="update-profile">UPDATE PROFILE</button>
            </div>

        </div>
    </div>


@endsection
