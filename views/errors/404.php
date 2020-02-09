<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_ENV['ST_NAME'] ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<style>
		*{
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;
		}
		.wrapper{
			min-height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			background: #fe867d;
			flex-direction: column;
		}
		.wrapper h2, h3{
			display: block;
			text-align: center;
			color: white;
            font-size: 30px;
		}
        .wrapper a{
            display: inline-block;
            text-align: center;
            color: white;
            font-size: 22px;
        }
		strong{
			font-size: 25px;
    		color: blueviolet;
		}
        .arrow-back{
            color: white;
            font-size: 25px;
            margin-bottom: -6px;
        }
        .alert{
            margin-bottom: -4px;
        }
        .wrapper-content{
            text-align: center;
            margin-top: -150px;
        }
	</style>
	
	<div class="wrapper">
		<div class="wrapper-content">
            <h2><ion-icon class="alert" name="alert"></ion-icon><?php echo $_ENV['ERROR_404'] ?></h2>
            <br>
            <p><ion-icon class="arrow-back" name="arrow-back"></ion-icon><a href="/"><?php echo $_ENV['ERROR_404_BACK_LINK'] ?></a></p>
        </div>
	</div>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
</body>
</html>