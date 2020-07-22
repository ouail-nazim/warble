<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>warble</title>
        <link rel="shortcut icon" href="/images/hh.png" type="image/x-icon"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/fontawesome/css/all.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <x-master>

        <div class=" items-center pt-10 full-height" style="height:460px">
            <div class="flex items-center justify-around">
                <div class="font-weight-bold">
                    <p style="color: #1a202c;font-size:20px; font-weight: bolder"> <span class="text-gray-900 " style="font-size: 30px">Warbel</span> is a free site web where you can connect <br> with other people and follow them <br>to get all the news from any where </p>
                    <br>
                    @auth()
                        <div class="flex">
                            <form id="logout-form" action="{{ route('home') }}" method="get" >
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-lg text-sm shadow px-10 py-2 text-white mr-4">You are already logged in</button>
                            </form>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-lg text-sm shadow px-10 py-2 text-white mr-4">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 rounded-lg text-sm shadow px-10 py-2 text-white mr-4" >Login</a>
                    @endauth

                </div>
                <div class="title ">
                    <img src="/images/hh.png" width="400px">
                </div>

            </div>
        </div>
        <div class="flex items-center justify-center pl-8" style="height:50px"  >
            <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded-full mr-4 hover:bg-blue-700"><span class="text-white mr-1">Github</span><i class="fab fa-github"></i></a>
            <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded-full mr-4 hover:bg-blue-700"><span class="text-white mr-1">Instagram</span><i class="fab fa-instagram"></i></a>
            <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded-full hover:bg-blue-700  "><span class="text-white mr-1">Facebook</span><i class="fab fa-facebook"></i></a>
        </div>
    </x-master>
    </body>
</html>
