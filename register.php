<?php

 	// connect db
    $conn =  mysqli_connect('localhost', 'root', '', 'php_login_app');

    // if conn error
    if (mysqli_connect_errno()) {
        echo json_encode(['status'=>'error', 'msg'=>"Something went wrong!"]);
    	exit();
    } else { // go with normal flow
        
        // get data from form
        $username = $_POST['full_name'];
        $email = $_POST['email_address'];
        $password = $_POST['password'];

        // check if email exists already
        $emailCheckQuery = "SELECT email_address FROM tb_users WHERE email_address = '$email';";
        $emailCheck = mysqli_query( $conn, $emailCheckQuery );

        if ($emailCheck == FALSE) { //query execution error
            echo json_encode(['status'=>'error', 'msg'=>"Something went wrong!"]);
            exit();
        } else { // no error 
            if (mysqli_num_rows($emailCheck) > 0) { //exist already
                echo json_encode(['status'=>'error', 'msg'=>"Email already exist!"]);
                exit();
            }

            // make hash of password
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);

            // run insert query
            $insertQuery = "INSERT INTO tb_users (user_name, email_address, password) VALUES ('$username', '$email', '$hashPassword');";
            $registerResult = mysqli_query( $conn, $insertQuery );

            if ($registerResult == FALSE) { //query exxecution error
                echo json_encode(['status'=>'error', 'msg'=>"Something went wrong!"]);
                exit();
            }
            // close connection
            mysqli_close( $conn );

            // return success msg
            echo json_encode(['status'=>'success', 'msg'=>"Registration Successful!"]);
        }
    }

?>