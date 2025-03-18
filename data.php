<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'test';

header('Access-Control-Allow-Origin: *');

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error)
    die('Ошибка подключения: ' . $conn->connect_error);

mysqli_set_charset($conn, 'utf8');

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS cakes (
	id int primary key AUTO_INCREMENT, 
	name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	size varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	image varchar(255))
");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS desserts (
	id int primary key AUTO_INCREMENT, 
	name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	size varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	image varchar(255))
");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS drinks (
	id int primary key AUTO_INCREMENT, 
	name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	size varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci, 
	image varchar(255))
");

$cat = isset($_GET['cat']) ? (int)$_GET['cat'] : 0;


$result = mysqli_query($conn, "SELECT id FROM cakes LIMIT 1");
if (mysqli_num_rows($result) == 0) {
	mysqli_query($conn, "INSERT INTO cakes (name, size, description, image) VALUES 
		('Торт \"Снежок\"', '630 гр', 'Нежный торт из классического бисквита и крема шантильи', 'items/cakes/1.jpg'),
		('Торт \"Домашний\"', '700 гр', 'Классический бисквит с кремом из взбитых сливок и домашнего творога', 'items/cakes/2.jpg'),
		('Торт \"Снежок\"', '950 гр', 'Нежный торт из классического бисквита и крема шантильи', 'items/cakes/3.jpg'),
		('Торт \"Клубничка\"', '1 000 гр', 'Классический бисквит, с кремом из натуральных взбитых сливок, цельной клубники и клубничного джема.', 'items/cakes/4.jpg'),
		('Торт \"Нежный в гляссаже\"', '850 гр', 'Нежный бисквит, пропитанный сиропом и прослоенный кремом из натуральных взбитых сливок с вареной сгущенкой. Поверхность торта покрыта гляссажом (зеркальной глазурью) и различным декором.', 'items/cakes/5.jpg'),
		('Торт \"Прага\"', '1 300 гр', 'Шоколадные коржи на основе сметаны и сгущенного молока, пропитаны сиропом. Коржи прослоены шоколадным кремом со сгущенным молоком. Торт покрыт ганашем из черного шоколада.', 'items/cakes/6.jpg'),
		('Торт \"Caramel\"', '50 гр', 'Молочные коржи с кремом «Патисьер», соленой карамелью и арахисом', 'items/cakes/7.jpg'),
		('Торт \"Каприз\"', '950 гр', 'Нежный бисквит с грецким орехом и изюмом, прослоенный кремом шантильи', 'items/cakes/8.jpg'),
		('Торт \"Фисташковый с малиной\"', '1 300 гр', 'Бисквит с фисташками со сливочно-сырным кремом, фисташковым пралине и малиной', 'items/cakes/9.jpg'),
		('Торт \"Шварцвальд\"', '700 гр', 'Классический вишневый торт из шоколадного бисквита с кремом шантильи', 'items/cakes/10.jpg'),
		('Торт \"Красный бархат\"', '1 180 гр', 'Шоколадный бисквит красного цвета со сливочно-сырным кремом на основе Маскарпоне', 'items/cakes/11.jpg'),
		('Торт \"Медовик со сливками\"', '580 гр', 'Традиционный классический торт из медовых коржей, прослоенных кремом шантильи', 'items/cakes/12.jpg')
	");
}

$result = mysqli_query($conn, "SELECT id FROM desserts LIMIT 1");
if (mysqli_num_rows($result) == 0) {
	mysqli_query($conn, "INSERT INTO desserts (name, size, description, image) VALUES 
		('Десерт Чак-Чак', '200 гр', 'Традиционный восточный десерт из тонких хрустящих палочек, с изюмом в медовом сиропе', 'items/desserts/1.jpg'),
		('Пирожное \"Кольца творожные\"', '220 гр', 'Кольца из заварного теста со сливочно-творожной начинкой.', 'items/desserts/2.jpg'),
		('Трубочки \"Крем-брюле\"', '450 гр', 'Рожок из слоеного теста, наполненный нежным кремом из натуральных взбитых сливок и вареной сгущенки. Декорирован слоеной крошкой.', 'items/desserts/3.jpg'),
		('Пирожное \"Шокобол\" медово-ореховый', '360 гр', 'Медово-ореховое пирожное со сливочным кремом, арахисом и грецким орехом. Поверхность покрыта медовой крошкой.', 'items/desserts/4.jpg'),
		('Тарталетки Ягодные', '180 гр', 'Песочное сабле с кремом Патисьер, под свежей ягодой.', 'items/desserts/5.jpg'),
		('Пирожное \"Эклер фисташковый\"', '40 гр', 'Классическое французское пирожное из теста пат-а-шу с начинкой из сырного крема и фисташкового пралине.', 'items/desserts/6.jpg'),
		('Пирожное \"Брауни\"', '240 гр', 'Американский десерт из нарезанных кусочков шоколадного пирога с дробленным грецким орехом, фисташкой и миндалем.', 'items/desserts/7.jpg'),
		('Десерт в стаканчике \"Три шоко\"', '110 гр', 'Трио нежнейших сливочных муссов из белого, молочного и темного шоколада.', 'items/desserts/8.jpg'),
		('Пирожное Йогуртовое со смородиной', '100 гр', 'Кексовый бисквит на основе йогурта и нежное йогуртовое суфле с частичками ароматной смородины. Поверхность украшена цельными ягодами смородины, покрытой гелем.', 'items/desserts/9.jpg')
	");
}

$result = mysqli_query($conn, "SELECT id FROM drinks LIMIT 1");
if (mysqli_num_rows($result) == 0) {
	mysqli_query($conn, "INSERT INTO drinks (name, size, description, image) VALUES 
		('Чай Смородина стакан КДК', '400 мл', 'Ягодный чай со добавлением натуральной смородины. Придает кисло-сладкий вкус.', 'items/drinks/1.jpg'),
		('Чай Букеты Иссык-Куля в ассор-те', '400 гр', 'Классический листовой чай, расфассованый в пирамидках.', 'items/drinks/2.jpg'),
		('Коктейль Ягодный Микс', '400 мл', 'Прохлодительный напиток коктейль с ярко-сочным вкусом состоящий из натуральных ягод смородины, малины, клубники. С добавлением вишневого сока.', 'items/drinks/3.jpg'),
		('Чай Имбирный стакан КДК', '400 мл', 'Полезный чай, приготовленный с корнем свежего имбаря с добавлением натурального меда и лимона. Имеет пряный вкус и приятный аромат.', 'items/drinks/4.jpg'),
		('Лимонад Клубничный Мохито', '350 мл', 'Освежающий клубничный лимонад с мятой и лаймом — лёгкий и яркий напиток для тёплого времени года. Сочетание охлаждённой газированной воды и льда с насыщенным клубничным пюре и сладким клубничным сиропом дарит насыщенный фруктовый вкус.', 'items/drinks/5.jpg'),
		('Коктейль Шоколадный', '350 мл', 'Десертный напиток на основе молока и натурального шоколадного мороженого собственного приготовления.', 'items/drinks/6.jpg')
	");
}

switch ($cat) {
    case 2:
		$result = mysqli_query($conn, "SELECT * FROM desserts");
        break;
    case 3:
		$result = mysqli_query($conn, "SELECT * FROM drinks");
        break;
    default:
       $result = mysqli_query($conn, "SELECT * FROM cakes");
}

if ($result && mysqli_num_rows($result) > 0) {

	while ($info = mysqli_fetch_assoc($result))
		echo $info['name'] . '|' . $info['size'] . '|' . $info['description'] . '|' . $info['image'] . "\r\n";
}

if ($conn)
	mysqli_close($conn);
?>