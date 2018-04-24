<?php
/**
 * Created by PhpStorm.
 * User: Kasutaja
 * Date: 04/21/18
 * Time: 13:47
 */
$host='localhost';
$user='root';
$psswd='';
$db='names';

$link=mysqli_connect($host,$user,$psswd);

if ($link->connect_error) {
    die("Connection failed: <br>" . $link->connect_error);
}
echo "Connected successfully<br>";


mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS ' . $db . ';');
//mysqli_select_db($link,$db);

mysqli_query($link, "COLLATE='utf8_general_ci';");
mysqli_query($link, 'SET NAMES utf8;');
mysqli_select_db($link, $db);

mysqli_query($link,'CREATE TABLE IF NOT EXISTS `people` (
	`id` CHAR(13) NOT NULL,
	`name` CHAR(13) NOT NULL,
	`lastname` CHAR(13) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');

//`age` int(3) NOT NULL,
//,"'.$age.'"

$fileN = fopen("name.txt","r");
$index=0;
$idArray=[0];

do{

    $peopleSTR=fgets($fileN);
    $people=explode(" ",$peopleSTR);
    if(!array_search($people[2],$idArray)) {
        //exec('py C:\laragon\www\dbNamesPHP\ikDEcoder.py '.$people[2],$age);
        if(mysqli_query($link, 'INSERT INTO people 
VALUES("'.$people[2].'","'.$people[0].'","'.$people[1].'"); ')=== TRUE) {
    } else {
        echo "Can't add<br> ";
    }
        $idArray[$index] = $people[2];
        $index++;
    }
}while(!feof($fileN));
fclose($fileN);
if($test=mysqli_query($link,'SELECT * FROM people')) {
    while ($rowOne = mysqli_fetch_assoc($test)) {
        echo "<li>" . $rowOne['id'] . '</li>';
    }
}else {echo 'errorrrr';}


?>