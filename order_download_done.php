<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
	exit();
}
else
{
	print $_SESSION['staff_name'];
	print 'さんログイン中<br />';
	print '<br />';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ろくまる農園</title>
</head>
<body>

	<?php

	try
	{
		$dsn='mysql:dbname=shop;host=localhost';
		$user='root';
		$password='';
		$dbh=new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES utf8');

		$sql='SELECT code,name FROM mst_staff WHERE 1';
		$stmt=$dbh->prepare($sql);
		$stmt->execute();

		$dbh=null;

		
	}

	catch (Exception $e)
	{
		print 'ただいま障害により大変ご迷惑をおかけしております。';
		exit();
	}

	?>

	<br />
	<a href="../staff_login/staff_top.php">トップメニューへ</a><br />

</body>
</html>