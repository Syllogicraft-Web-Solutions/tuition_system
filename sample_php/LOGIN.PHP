<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['Username']) || empty($_POST['Password'])) {
        $error = "Username or Password cannot be empty";
        echo $error;
        //header('location: login.html');
        header('Refresh: 5; URL=login.html');
    }
    else
    {
// Define $username and $password
        $username=$_POST['Username'];
        $password=$_POST['Password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
// Selecting Database
        $db = mysql_select_db("tuition", $connection);
// SQL query to fetch information of registerd users and finds user match.
        $query = mysql_query("select * from users_student where Password='$password' AND Username='$username'", $connection);
        $rows = mysql_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
            echo $error;
        }
        mysql_close($connection); // Closing Connection
    }
}
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           