<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Assignment | Register/Login</title>
</head>
<body>

	<main>
		<!-- Heading -->
	    <section class=" text-center my-4 mx-2">	    	
			<h2>Welcome to Assignment Application</h2>			
	    </section>

	    <!-- Both Forms Section -->
		<section class="container">
			<section class="sections-box row">
			
				<!-- Register -->
	    		<section class="col-md-6 pt-3 text-center">
			    	<h4>Register</h4>

		            <form method="POST" id="form_register" class=" my-4 pb-0" onsubmit="Register()">
		            	<!-- Row 1 : Name -->
		                <div class="form-row my-3">
		                    <div class="col-md-3">
		                        <label>Name<span class="form-sterik">*</span></label>
		                    </div>
		                    <div class="col-md-9">
		                        <input type="text" class="form-control" placeholder="Enter your name" id="full_name" name="full_name" required="true" maxlength="10" minlength="2" autocomplete="off" autofocus>
		                    </div>
		                </div>


		                <!-- Row 2 : Email -->
		                <div class="form-row my-3">
		                    <div class="col-md-3">
		                        <label>Email<span class="form-sterik">*</span></label>
		                    </div>
		                    <div class="col-md-9">
		                        <input type="email" class="form-control" placeholder="Enter your email" id="email_address" name="email_address" required="true" maxlength="100" minlength="5" autocomplete="off">
		                    </div>
		                </div>

		                <!-- Row 3 : Password -->
		                <div class="form-row my-3">
		                    <div class="col-md-3">
		                        <label>Password<span class="form-sterik">*</span></label>
		                    </div>
		                    <div class="col-md-9">
		                        <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" required="true" maxlength="15" minlength="4" autocomplete="off">
		                    </div>
		                </div>

		                <!-- Submit button -->
		                <section class="my-button-container mt-3 mb-0">
		                    <input class="my-button" id="register-button" type="submit" value="REGISTER">
		                </section>
		            </form>
		    	</section>

		    	<!-- Login -->
		    	<section class="col-md-6 pt-3 text-center">
		    		<h4>Login</h4>

		            <form method="POST" id="form_login" class="my-4 pb-0" onsubmit="Login()">
		                <!-- Row 1 : Email -->
		                <div class="form-row my-3">
		                    <div class="col-md-3">
		                        <label>Email</label>
		                    </div>
		                    <div class="col-md-9">
		                        <input type="email" class="form-control" placeholder="Enter your email" id="email_address_login" name="email_address_login" required="true" maxlength="100" autocomplete="off">
		                    </div>
		                </div>

		                <!-- Row 2 : Password -->
		                <div class="form-row my-3">
		                    <div class="col-md-3">
		                        <label>Password</label>
		                    </div>
		                    <div class="col-md-9">
		                        <input type="password" class="form-control" placeholder="Enter your password" id="password_login" name="password_login" required="true" maxlength="15" autocomplete="off">
		                    </div>
		                </div>

		                <!-- Submit button -->
		                <section class="my-button-container mt-3 mb-0">
		                    <input class="my-button" id="login-button" type="submit" value="LOGIN">
		                </section>
		            </form>
		    	</section>
			</section>
		</section> 
	</main>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script>
    	// Register function 
		function Register() {
			event.preventDefault(); 
            var formData = $("#form_register").serialize();
            var script_url = 'register.php';

            $.ajax ({
                type: 'POST',
                url: script_url,
                dataType: "json",
                data: formData,
                success: function(response) { 
                	if(response.status == "success") {
                    	$("#full_name, #email_address, #password").val("");
                    }
                    alert(response.msg);
                },
                error: function(xhr, status, error) {
                    alert("Something went wrong!");
                }
            });
		}

		//Login function
		function Login() {
			event.preventDefault(); 
            var formData = $("#form_login").serialize();
            var script_url = 'login.php';

            $.ajax ({
                type: 'POST',
                url: script_url,
                dataType: "json",
                data: formData,
                success: function(response) { 
                	if(response.status == "success") {
                		$("#email_address_login, #password_login").val("");
                		// alert(response.msg);
                    	window.location.replace("homepage.php");
                	} else {
                		alert(response.msg);
                	}
                },
                error: function(xhr, status, error) {
                    alert("Something went wrong!");
                }
            });
		}
	</script>


</body>
</html>