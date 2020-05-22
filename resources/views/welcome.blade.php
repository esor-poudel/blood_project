<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
                  #map {
        height: 500px;  /* The height is 400 pixels */
        width: 400%;  /* The width is the width of the web page */
       }
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                        
                        <form action="{{route('donars.search')}}" method="post">
                            {{csrf_field()}}
                                             
                    <div class="form-group">
                        <label for="name">Blood Group</label>
                       <select id="b_group" name="search">
                       <option value="A+"> A+ </option>
                       <option value="A-"> A- </option>
                       <option value="B+"> B+ </option>
                       <option value="B-"> B- </option>
                       <option value="O+"> O+ </option>
                       <option value="O-"> O- </option>
                       <option value="AB+"> AB+ </option>
                       <option value="AB-"> AB- </option>
                       </select>
                        </div>
                        
                            
                    <div class="form-group">
                        <div class="text-center">
                        <button class="btn btn-success " type="submit">search</button>
                        </div>

                        </form>

                    <a href="{{route('blood.need')}}">post need for blood</a>

                    </div>
                    <div class="form-group">
                        <label for="map">map</label>
                        <input type="text" id="searchmap">
                        <div id="map"></div>

                    </div>
                </div>
            </div>
        </div>
        <script>
            // Initialize and add the map
            function initMap() {
              // The location of Uluru
              var uluru = {lat: 27.717245, lng: 85.323959};
              // The map, centered at Uluru
              var map = new google.maps.Map(
                  document.getElementById('map'), {zoom: 5, center: uluru});
              // The marker, positioned at Uluru
             // var marker = new google.maps.Marker({position: uluru, map: map});
            }
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKTEDvIvNu8mWE8OwLtE0d_nIvDK4BuY4&callback=initMap">
                </script>
    </body>
</html>
