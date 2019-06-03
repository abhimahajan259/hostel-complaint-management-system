<?php
   define("DB_SERVER", "localhost");
   define("DB_USERNAME", "root");
   define("DB_PASSWORD", "");
   define("DB_DATABASE", "cms");
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(mysqli_connect_errno())
   {
	   die("DATABASE CONNECTION FAILED: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
   }
?>