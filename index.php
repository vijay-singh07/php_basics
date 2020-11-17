<?php

    require_once 'connection.php';

    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {

        // username and password sent from form
        $username_entered = mysqli_real_escape_string( $database_connection, $_POST['username'] );
        $password_entered = mysqli_real_escape_string( $database_connection, $_POST['password'] );

        $sql    = sprintf( "SELECT * from first_table WHERE Username = '%s' and Password = '%s'", $username_entered, $password_entered );
        $result = mysqli_query( $database_connection, $sql );

        $result_rows_count = mysqli_num_rows( $result );

        // If result matched $username and $password, then $result_rows_count must be aleast 1
        if( $result_rows_count >= 1 ) {

            $_SESSION['login_user'] = $username;

            header( 'location: home.html' );
        } else {
            $error_msg = "Your Login Name or Password is invalid";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
    </head>
    <body>
        <div id="main">

            <?php if ( isset( $error_msg ) ) : ?>
                <h1><?php echo $error_msg; ?></h1>
            <?php endif; ?>

            <h1>SIMPLE LOGIN</h1>
            <form method="POST">
                <label>Username:<input type="text" name="username" class="text" autocomplete="off" required></label>
                <label>Password:<input type="Password" name="password" class="text" required></label>
                <input type="Submit" name="Submit" id="Sub">
            </form>
        </div>
    </body>
</html>
