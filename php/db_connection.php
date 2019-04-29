<?php 
	//使用PDO存取資料庫時，需要將資料庫依下列格式撰寫，讓程式讀取資料庫
	$config_set['db_connection']['dsn'] = 'mysql:dbname=wtclass;host=localhost;chartset=utf8';
	$config_set['db_connection']['user_name'] = 'rockuo';
	$config_set['db_connection']['password'] ='jj088514';
	//建立使用PDO方式連線的物件，並放入指定的相關資料
	$dbh = new PDO(
		$config_set['db_connection']['dsn'],
		$config_set['db_connection']['user_name'],
		$config_set['db_connection']['password'],
		array(//錯誤回報
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			)
	);
	//可以開始線上抓資料了，要進入http://localhost:8080/test/connect/db_connection.php這個網站看

?>