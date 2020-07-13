<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Placed Order</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


</head>
<body>
    <style>
        .signup-form
        {
            width:15%;
            margin:auto;
            position:absolute;
            bottom:500px;
            left:800px;
        }
        h1
        {
            color: #2FAC66;
            font-weight: bold;
            padding-bottom: 15px;
        }
        i 
        {
            color: #2FAC66;
            width: 60px;
            border-radius: 60px;
            background: #dff0d8;
            display: inline-block;
            line-height: 62px;
            font-size: 28px;
        }
        .btn, .btn:hover
        {
            background:#2FAC66;
            border:none;
            margin-right:30px;
        }
        .btn a
        {
            color:#FFFFFF;
        }
        .text
        {
            text-align:center;
        }
        .button
        {
            position:absolute;
            left:80px;
        }
    </style>
    <div class="signup-form text-success">
        <h1 class=text>Success</h1>
        <p class="text">Your order has been placed<p>
        <div class="button">
            <button type="button" class="btn btn-danger text-center"><a href="dashboard">Explore Products</a></button>
        </div>
    </div>
</body>

</html>