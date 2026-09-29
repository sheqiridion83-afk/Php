<?php
session_start();
$user="root";
$pass="";
$server="localhost";
$dbname="test";

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);

}catch(DPException $e){
    echo "error: ". $e->getMessages();
}
