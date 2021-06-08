<?php
    // connect db
    $conn =  mysqli_connect('localhost', 'root', '', 'php_login_app');

    // if conn error
    if (mysqli_connect_errno()) {
        echo json_encode(['status'=>'error', 'msg'=>"Something went wrong!"]);
        exit();
    } else { // go with normal flow

        // get data from app
        $email = $_POST['email_address_login'];
        $password = $_POST['password_login'];

        // run login query
        $loginQuery = "SELECT user_id, password, user_name FROM tb_users WHERE email_address = '$email';";
        $queryResponse = mysqli_query( $conn, $loginQuery );

        if ($queryResponse == FALSE) { //query execution error
            echo json_encode(['status'=>'error', 'msg'=>"Something went wrong!"]);
            exit();
        } else { // no error
            // if email exists 
            if (mysqli_num_rows($queryResponse) > 0) {
                $row = mysqli_fetch_row( $queryResponse );
                $hash = $row[1]; //fetch pw hash from DB

                // decrypt password w.r.t. hash, if it is same as entered login success
                if (password_verify($password, $hash)) {
                    // store name in session
                    session_start();
                    $_SESSION['username'] = $row[2];

                    echo json_encode(['status'=>'success', 'msg'=>"Login Successful!"]);
                    exit();
                }
            }
            // close connection
            mysqli_close( $conn );

            // return failure msg in case of no email exist or wrong email or pw
            echo json_encode(['status'=>'error', 'msg'=>"Invalid email or password!"]);
            exit();
        }
    }
?>