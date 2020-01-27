<?php

if (!isset ($_SESSION["login"]) || $_SESSION ["login"] != true){
	header ("Location: ../pagenotfound.php");
}
else if ($_SESSION["id_level"] = 1){
	$_SESSION ["login"] = true;
}
else{
	header ("Location: ../pagenotfound.php");
}

?>