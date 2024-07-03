<?php
session_start();
require("conn.php");
require("functions.php");
if(isset($_POST["action"]) && !empty($_POST) && $_POST["action"]=="ftsetup"){

    firstTimeSetup($dbName, $conn);

}else if(isset($_POST["action"]) && !empty($_POST) && $_POST["action"]=="fterror"){

    dropDatabase($dbName, $conn);
    
}else if(isset($_POST["action"]) && !empty($_POST) && $_POST["action"]=="ftsetup"){

}else if(isset($_POST["action"]) && !empty($_POST) && $_POST["action"]=="ftsetup"){

}else{
    echo "ACCESS DENIED!\n Go Back to Main Pages.";
}