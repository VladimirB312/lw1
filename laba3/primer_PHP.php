<?php
// 1. вывести все данные о сервере и заголовках
echo 'Данные в глоабльном массиве $_SERVER';
foreach ($_SERVER as $key => $header) {
  echo "{$key} = {$header} </br>";
}
echo '<br>---------------<br>';

// 2. вывести время запроса
$requestTime = $_SERVER['REQUEST_TIME'];
echo "Timestamp запроса {$requestTime} <br>";

// 3.1 работа с timestamp: вывести текущее дата+время в определенном формате
// все форматы https://www.php.net/manual/ru/datetime.format.php
$now = date("Y-m-d H:i:s");
echo "Текущая дата и время: {$now} <br>";

// 3.2 работа с timestamp: вывести определенную дату и время в определенном формате
$requestDateTime = date("Y-m-d H:i:s", $requestTime);
echo "Дата и время запроса: {$requestDateTime} <br>";

$lastDay = date("H*i*s Y/m/d", 1717189199);
echo "Последний день учебы: {$lastDay} <br>";

// 3.3 работа с timestamp: превратить дату в timestamp
$timestampNow = strtotime('now');
echo "Текущий timestamp: {$timestampNow} <br>";

$timestampDatetime = strtotime($now);
echo "Текущий timestamp: {$timestampDatetime} <br>";

$timestampNextWeek = strtotime('+1 week 2 days 4 hours 2 seconds');
echo "Какой-то timestamp на след неделе {$timestampNextWeek} <br>";

// 3.4 работа с timestamp: выводим timestamp определенной даты
echo mktime(9, 24, 57, 5, 23, 1995) . '<br>';

echo '<br>---------------<br>';

// 4. вывести метод, URL и IP
$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
$ipAddress = $_SERVER['REMOTE_ADDR'];

echo 'Method: ' . $method . '</br>';
echo 'URL: ' . $url . '</br>';
echo 'IP Address: ' . $ipAddress . '</br>';

echo '<br>---------------<br>';

// 5. Распечатаем все GET-параметры
foreach ($_GET as $key => $value) {
    echo "{$key} = {$value} </br>";
}

// 6. Распечатаем все POST-параметры
foreach ($_POST as $key => $value) {
  echo "{$key} = {$value} </br>";
}