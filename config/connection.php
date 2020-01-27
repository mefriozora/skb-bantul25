<?php

$connect = mysqli_connect("localhost", "root", "", "skb");

if(mysqli_connect_errno()){
    printf ("Connection failed : ".mysqli_connect_error());
    exit();
}

?>