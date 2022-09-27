<?php

    $dbname = "team";
	$user = "root";
	$password = "allenstu6311";

	$dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";

	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
	
	//建立pdo物件
	$pdo = new PDO($dsn, $user, $password, $options);

?>