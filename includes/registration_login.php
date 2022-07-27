<?php
// variable declaration
$username = "";
$email = "";
$name = '';
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = esc($_POST['username']);
    $email = esc($_POST['email']);
    $name = esc($_POST['name']);
    $password = esc($_POST['password']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Uhmm...We gonna need your username");
    }
    if (empty($email)) {
        array_push($errors, "Oops.. Email is missing");
    }
    if (empty($password)) {
        array_push($errors, "uh-oh you forgot the password");
    }
    if (empty($name)) {

        array_push($errors, "uh-oh you forgot the name");
    }

    // Ensure that no user is registered twice. 
    // the email and usernames should be unique
    $user_check_query = "SELECT * FROM users WHERE username='$username' 
								OR email='$email' LIMIT 1";

    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists

        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $password = hash_hmac('sha256', $password, 'secret');

        //encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, name, password) 
					  VALUES('$username', '$email', '$name', '$password')";
        mysqli_query($conn, $query);

        // get id of created user
        $reg_user_id = mysqli_insert_id($conn);

        // put logged in user into session array
        $_SESSION['user'] = getUserById($reg_user_id);

        // if user is admin, redirect to admin area
        if ($_SESSION['user']) {
            $_SESSION['message'] = "You are now logged in";
            // redirect to admin are
            // redirect to public area
            header('location: index.php');
            exit(0);
        }
    }
}

// LOG USER IN
if (isset($_POST['login_btn'])) {
    $username = esc($_POST['username']);
    $password = esc($_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username required");
    }
    if (empty($password)) {
        array_push($errors, "Password required");
    }
    if (empty($errors)) {
        $password = hash_hmac('sha256', $password, 'secret');
        $sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // get id of created user
            $reg_user_id = mysqli_fetch_assoc($result)['id'];

            // put logged in user into session array
            $_SESSION['user'] = getUserById($reg_user_id);

            // if user is admin, redirect to admin area
            if ($_SESSION['user']) {
                $_SESSION['message'] = "You are now logged in";
                // redirect to public area
                header('location: index.php');
                exit(0);
            }
        } else {
            array_push($errors, 'Wrong credentials');
        }
    }
}
// escape value from form
function esc(String $value)
{
    // bring the global db connect object into function
    global $conn;

    $val = trim($value); // remove empty space sorrounding string
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
}
// Get user info from user id
function getUserById($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // returns user in an array format: 
    // ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
    return $user;
}
