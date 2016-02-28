<!--Susan Smith-php repositories connect database-->
<?php
	$dsn='mysql:host=; dbname=';
	$username='';
	$password='';


	try{
	$db=new PDO($dsn, $username, $password);
			//echo "Success";
	}catch(PDOException $e){
		$error_message=$e->getMessage();
		include('REPOSb_database_error.php');
		exit();


	}
 ?>
 <meta charset="utf-8">
