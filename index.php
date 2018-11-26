<!DOCTYPE HTML>

<!--
************************
Created by Stepan Pesout
*****www.pesout.eu******
************************
-->

<html>
	<head>
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>No SQL webapp registration</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<h2>Registration</h2>
		<form action="login.php?ACTION=registration" method="post" id="registration_form">
	    	
	    	<label for="username">Username: </label>
	    	<input type="text" name="username" id="username"><br>
	    	
	    	<label for="password">Password: </label>
	    	<input type="text" name="password" id="password"><br>
	    	
	    	<label for="password2">Repeat password: </label>
	    	<input type="text" name="password2" id="password2"><br>
	    	
	    	<!-- Antispam -->
	    	<input type="text" name="email_address" style="display:none;">
	    	
	      	<input type="submit" value="Submit">
	  	</form>
	  	
	  	<h2>Login</h2>
		<form action="login.php?ACTION=login" method="post" id="login_form">
	    	
	    	<label for="username">Username: </label>
	    	<input type="text" name="username" id="username"><br>
	    	
	    	<label for="password">Password: </label>
	    	<input type="text" name="password" id="password"><br>
	    	
	    	<!-- Antispam -->
	    	<input type="text" name="email_address" style="display:none;">
	    	
	      	<input type="submit" value="Submit">
	  	</form>
 
		<script>
			$("#registration_form").submit(function(event){
				event.preventDefault();
				var post_url = $(this).attr("action");
				var request_method = $(this).attr("method");
				var form_data = $(this).serialize();

				$.ajax({
					url : post_url,
					type: request_method,
					data : form_data
				})
				.done(function(response){
					alert(response);
				})
				.fail(function() {
    				alert("Something went wrong, please try again later.");
 				});
			});
			
			$("#login_form").submit(function(event){
				event.preventDefault();
				var post_url = $(this).attr("action");
				var request_method = $(this).attr("method");
				var form_data = $(this).serialize();

				$.ajax({
					url : post_url,
					type: request_method,
					data : form_data
				})
				.done(function(response){
					alert(response);
				})
				.fail(function() {
    					alert("Something went wrong, please try again later.");
 				});
			});
		</script>
	</body>
</html>
