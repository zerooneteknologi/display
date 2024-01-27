<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salamnunggal | Display</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* flip */

        /* jam */
        #jam span {
            float: left;
            text-align: center;
            font-size: 50px;
            margin: 0 4.1%;
            padding: 0 5%;
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
    </style>
</head>

<body class="overflow-hidden">