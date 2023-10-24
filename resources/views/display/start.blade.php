<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        #jam span {
            float: left;
            text-align: center;
            font-size: 3rem;
            margin: 0 2.5%;
            padding: 20px;
            width: 20%;
            border-radius: 10px;
            box-sizing: border-box;
        }

        #jam span:nth-child(1) {
            background: #a70c0c;
        }

        #jam span:nth-child(2) {
            background: #f6ab29;
        }

        #jam span:nth-child(3) {
            background: #298f19;
        }

        #jam::after {
            content: "";
            display: block;
            clear: both;
        }

        #unit span {
            float: left;
            width: 20%;
            margin-top: 30px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 18px;
            text-shadow: 1px 1px 1px rgba(10, 10, 10, 0.7)
        }

        span.turn {
            animation: turn 0.7s ease;
        }

        @keyframes turn {
            0% {
                transform: rotateX(0deg)
            }

            100% {
                transform: rotateX(360deg)
            }
        }

        @media screen and (max-width: 980px) {
            #jam span {
                float: left;
                text-align: center;
                font-size: 50px;
                margin: 0 1.5%;
                padding: 20px;
                width: 20%;
            }

            h1 {
                margin: 20px 5%;
            }

            .jam-digital {
                width: 100%;
                margin: 10% 20%;
            }

            #unit span {
                width: 25%;
            }
        }
    </style>
</head>

<body class="overflow-hidden">
