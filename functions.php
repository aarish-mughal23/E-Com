<?php
function firstTimeSetup($dbName, $databaseConnection) {
    // Create the database
    $sql = "CREATE DATABASE `$dbName`";
    if ($databaseConnection->query($sql) === TRUE) {
        $_SESSION["dbSuccess"] = "Database Creation Successful";

        // Connect to the newly created database
        $databaseConnection->select_db($dbName);

        // Create the users table
        $sql = "CREATE TABLE users( 
            id INT PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            phone VARCHAR(20),
            gender VARCHAR(20),
            role BOOLEAN,
            salt_key INT
        )";
        if ($databaseConnection->query($sql) === TRUE) {
            $_SESSION["dbSuccess"] = "Database Setup Successful";
            $_SESSION["dbName"] = $dbName;
            header("location: index.php");
            exit;
        } else {
            $_SESSION["dbFail"] = "There was an error in Table Creation: " . $databaseConnection->error;
        }
    } else {
        $_SESSION["dbFail"] = "There was an error in Database Creation: " . $databaseConnection->error;
    }
}

function dropDatabase($dbName, $databaseConnection){
    $sql = "DROP DATABASE `$dbName`";
    if ($databaseConnection->query($sql) === TRUE) {
        $_SESSION["dbSuccess"] = "Database Deletion Successful";
        header("location: index.php");
        exit;
    }else {
        $_SESSION["dbFail"] = "There was an error in Database Deletion: " . $databaseConnection->error;
    }
}

function signupUser($formData, $databaseConnection){
    $error = array();
    $email = $formData["email"];
    $password = $formData["password"];
    $password2 = $formData["password2"];
    $phone = $formData["phone"];
    $gender = $formData["gender"];

    if(empty($email)){
        $error["email"] = "Email Address Cannot be Empty";
    }
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $response = mysqli_query($databaseConnection,$sql);
    if(mysqli_num_rows($response) > 0){
        $error["email"] = "User with that Email Address already exists. Please Login.";
    }
    if(empty($password)){
        $error["password"] = "Password Cannot be Empty";
    }
    if(empty($password2) || $password2 != $password){
        $error["password2"] = "Passwords Do no Match";
    }
    if(empty($phone)){
        $error["phone"] = "Phone Number Cannot be Empty";
    }
    if(empty($gender)){
        $error["gender"] = "Select an Option";
    }
    

    if(empty($error)){
        $saltkey = rand(0,100);
        $saltedPass = $password.$saltkey;
        $password = md5($saltedPass);
        $sql = "INSERT INTO users (email, password, phone, gender, role, salt_key) VALUES ('$email','$password','$phone','$gender', 0,'$saltkey')";
        $response = mysqli_query($databaseConnection, $sql);
        if(mysqli_affected_rows($databaseConnection) > 0) {
            echo "<script>alert('Account Created Successfully.')</script>";
            echo "<script>window.location.href = './login.php'</script>";
            exit();
        }else{
            echo "<script>alert('Account Creation Failed')</script>";
            echo "<script>window.location.href = './signup.php'</script>";
            exit();
        }
    }else{
        $_SESSION["error"] = $error;
        $_SESSION["userData"] = $formData;
        header("location: signup.php");
        exit;
    }
}

function loginUser($formData, $databaseConnection){
    $error = array();
    $email = $formData["email"];
    $password = $formData["password"];

    if(empty($email)){
        $error["email"] = "Email Address is Required.";
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $response = mysqli_query($databaseConnection,$sql);
        if(mysqli_num_rows($response) < 1){ // Record Not found.
            $error["userAcc"] = "No User Found against the entered Email Address.";
        } else {
            $userDb = mysqli_fetch_assoc($response);
            $formPass = md5($password.$userDb["salt_key"]);
            if($formPass != $userDb["password"]) { // Incorrect Password
                $error["userAcc"] = "Incorrect Password.";
            }
        }
    }

    if(empty($password)){
        $error["password"] = "Password cannot be Empty.";
    }

    if(empty($error)){
        $_SESSION["success"] = "Logged In Successfully.";
        $_SESSION["user"] = $userDb;        //Login Successful.
        echo "<script>alert('Account Logged In Successfully!')</script>";
        echo "<script>window.location.href = './dashboard.php'</script>";
        exit;
    }else{
        $_SESSION["error"] = $error;
        $_SESSION["userData"] = $formData;
        header("location: login.php");
        exit;
    }
}