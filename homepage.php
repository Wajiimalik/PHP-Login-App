<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Assignment | Home Page</title>
</head>
<body>

	<section class=" text-center my-4 mx-2">

		<?php 
			session_start();
			if(!isset($_SESSION['username'])){
			   header("Location:index.php");
			} else {
				echo "<h2>Hello, " . $_SESSION["username"] . "</h2>";
			}
		?>	    	
		<a href="index.php" onclick="<?php unset($_SESSION['username']); ?>">Logout</a>
						
	</section>

</body>
</html>