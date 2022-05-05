<html>
<head>
<meta charset="utf-8">
<title>My First Page</title>

</head>
<body>
<div>
<style>
body {
	margin-top:50px;
	font-family: 'Open Sans', sans-serif;
	
}
div{
	padding: 30px;
	background: #ffbe0d;
	width:30%;
	margin:0 auto;
}
</style>
<?PHP
include "phpqrcode/qrlib.php";    

	//принимаем форму
$from = $_POST[ 'from' ];
$where = $_POST[ 'where' ];	
$Name = $_POST[ 'Name' ];
$lastName = $_POST[ 'lastName' ];
$middleName = $_POST[ 'middleName' ];
$date = $_POST[ 'date' ];
$passportNumber = $_POST[ 'passportNumber' ];
$passportSeries = $_POST[ 'passportSeries' ];
$baggage = $_POST [ 'answer' ];

	$db_host = 'localhost';
	$db_name = 'user';
	$db_username = 'root';
	$db_password = '';
	
//создаем подключение
$link = mysqli_connect( $db_host, $db_username, $db_password, $db_name);
mysql_connect($db_host, $db_username, $db_password) or die('Connection error.');
mysql_query("SET NAMES 'utf8'");

	// соединяемся с сервером базы данных
	$connect_to_db = mysql_connect($db_host, $db_username, '')
	or die("Could not connect: " . mysql_error());

	// подключаемся к базе данных
	mysql_select_db($db_name, $connect_to_db)
	or die("Could not select DB: " . mysql_error());

	$qr_result = mysql_query("SELECT *
	FROM flight
	WHERE fromS LIKE '$from'
	AND whereS LIKE '$where'
	");

	while($data = mysql_fetch_array($qr_result)){ 
	echo '<table border="1">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Откуда</th>';
	echo '<th>Куда</th>';
	echo '<th>Номер рейса</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	
	echo "Рейс найден";  
	echo '<tr>';
	echo '<td>' . $data['fromS'] . '</td>';
	echo '<td>' . $data['whereS'] . '</td>';
	echo '<td>' . $data['numberR'] . '</td>';
	echo '</tr>';
	$flight = $data['numberR'];
	$q1 = true;
	}

	echo '</tbody>';
	echo '</table>';
	
QRcode::png("$passportNumber", "qrcode.png", "L", 4, 4);

	//создаем запрос
	$query ="SELECT *
	FROM userData 
	WHERE passportNumber LIKE $passportNumber";
	
	//выполняем запросм
	$result = mysqli_query($link, $query) or die("Ошибка" ); 
	if($result)
	{
		$q2 = true;
	}

	//проверяем наличие пользователя
	if ($q2 && $q1)
	{
	$insert_sql = "INSERT INTO userForm (firstName, lastName, middleName, baggage, passportNumber, flight)" .
	"VALUES('{$Name}', '{$lastName}', '{$middleName}', '{$baggage}', '{$passportNumber}','{$flight}');";
	mysql_query($insert_sql);
	
	echo "<span style='color:blue;'>Указаны верные пасспортные данные</span><br>";
	echo "Ваше ФИО: $Name $lastName $middleName<br>";
	echo " <a href='pdfgenerator.php'>Билет</a>";
	
	}

	else {
		echo "<span style='color:red;'>Ошибка</span><br>";
		echo "Указанны неверные данные<br>";
	}
	
// закрываем соединение с сервером  базы данных
	mysql_close($connect_to_db);

?>
</div>

</body>
</html>