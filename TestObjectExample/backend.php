<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) and isset($_POST["pass"])){
        require_once "ExampleClass.class.php";
        $res = ExampleClass::getInstance();
        sleep(5); //server actions imitation
        echo $res->show($_POST["login"]);
    }
}