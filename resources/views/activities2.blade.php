@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tab">
                            <a href="/activities"><button class="tablinks" onclick="openCity(event, 'Learning')">Learning</button></a>
                            <a href="/activities1"><button class="tablinks" onclick="openCity(event, 'Teaching')">Teaching</button></a>
                            <a href="/activities2"><button class="tablinks" onclick="openCity(event, 'Socializing')">Socializing</button></a>
                        </div>

                        <!-- Tab content -->
                        <br>
                        <div id="London" class="tabcontent">
                            <h3>1. Trekking</h3>
                        </div>

                        <div id="Paris" class="tabcontent">
                            <h3>2. Hiking</h3>
                        </div>

                        <div id="Tokyo" class="tabcontent">
                            <h3>3. Games</h3>
                        </div>

                        <div id="Tokyo" class="tabcontent">
                            <h3>4. Intellectual tasks</h3>
                        </div>
                    </div>
                    [[hobbies]]
                </div>
            </div>
        </div>
    </div>
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
@endsection
