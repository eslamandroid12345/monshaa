<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@lang('dashboard.Courses') | @lang('dashboard.Dashboard') | @yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("css/adminlte.css")}}">

    @if(app()->getLocale() == 'ar')
        <!-- Override RTL theme style -->
        <link rel="stylesheet" href="{{asset("css/adminlte-rtl.css")}}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;700&display=swap');

        body{
            font-family: 'Noto Sans Arabic', sans-serif;
        }

    </style>

    @endif
    @if(app()->getLocale() == 'en')

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @endif
    <!-- CSS addons -->
    @yield('css_addons')

    <style>
        .btn-add {
            width: 200px;
            background-color: #79edd2;
            border: none;
            outline: none;
            height: 49px;
            border-radius:12px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
      }
    </style>



    <style>
        .edu-pagination {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .edu-pagination li {
            margin: 0 5px; /* Add spacing between pagination items */
        }

        .edu-pagination li a {
            text-decoration: none;
            color: #007bff;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        .edu-pagination li.disabled a {
            color: #aaa;
            cursor: not-allowed;
        }

        .edu-pagination li a:hover {
            background-color: #f0f0f0;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .edu-pagination li {
                margin: 5px 0; /* Adjust spacing for smaller screens */
            }
        }
    </style>

</head>
