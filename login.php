<?php
    /*
    ************************
    Created by Stepan Pesout
    *****www.pesout.eu******
    ************************
    */

    header('Content-type: text/plain; charset=utf-8');
    
    function generateSalt() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 64; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return md5($randomString);
    }
    
     
    if ($_POST["username_address"] != "") die("Spam"); // Antispam

    if (strpos($_SERVER['HTTP_ORIGIN'], $_SERVER['HTTP_HOST']) !== false) { // Prevent requests from outside
       
        if ($_GET["ACTION"] == "registration") {
            
            if (isset($_POST["username"]) && $_POST["username"] != "" &&
              isset($_POST["password"]) && $_POST["password"] != "" ){
                
                if ($_POST["password"] != $_POST["password2"]) die("Passwords_do_not_match");
    	        
                $filecontent_out = file_get_contents('users.php');
    	        
    	        $users = explode("|" , substr($filecontent_out, 9, -5));
    	        array_pop($users);
    	        
    	        foreach ($users as $data) {
    	            $user = substr(explode("~" , $data)[0], 1);	            
    	            if ($user == $_POST["username"]) die("User_exists");
    	        }
    	        	        
    	        $salt = generateSalt();
    	        $data =
        	        $_POST["username"] .
        	        "~" .
        	        md5($salt . md5($_POST["password"]) . $salt) .
        	        "~" .
        	        $salt;
    	        
    	        $filecontent=file_get_contents('users.php');
    	        $pos=strpos($filecontent, '*/ ?>');
    	        $filecontent = substr($filecontent, 0, $pos) . $data . "|\n" . substr($filecontent, $pos);
    	        file_put_contents("users.php", $filecontent);
    	        
    	        echo "Success";
    	        
    	    } else die("Empty_fields_in_form");
        }
        
        if ($_GET["ACTION"] == "login") {
            
            if (isset($_POST["username"]) && $_POST["username"] != "" &&
                isset($_POST["password"]) && $_POST["password"] != "" ){
                    
                    $filecontent_out = file_get_contents('users.php');
                    
                    $users = explode("|" , substr($filecontent_out, 9, -5));
                    array_pop($users);
                    
                    foreach ($users as $data) {
                        $user = substr(explode("~" , $data)[0], 1);
                        $pass = explode("~" , $data)[1];
                        $salt = explode("~" , $data)[2];
                        
                        if ($user == $_POST["username"] &&
                          md5($salt . md5($_POST["password"]) . $salt) == $pass) {
                            die("Success");
                        }
                    }
                    
                    die("Wrong_username_or_password");
                                   
                } else die("Empty_fields_in_form");
        }
	    
	} else die("Unauthorized");
	
?>

