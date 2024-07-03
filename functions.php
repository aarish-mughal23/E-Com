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
            gender VARCHAR(20)
        )";
        if ($databaseConnection->query($sql) === TRUE) {
            $_SESSION["dbSuccess"] = "Database Setup Successful";
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
