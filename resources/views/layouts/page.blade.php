<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dummycart</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
        html, body {
                background-color: #fff;
                color: #2d3336;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
            margin-left:auto;
            margin-right:auto;
        }
        th, td {
            padding:4px;
        }
        .title {
            font-size: 48px;
            margin-top:30px;
            margin-bottom: 30px;
        }
        .capitalize {
            text-transform:capitalize;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <button>My Cart</button>
     @yield("header")

     @yield("content")

    <script>
        /*
        All js files which are necessary for our app will be here
        */
    </script>

    @yield("script")
</body>
</html>