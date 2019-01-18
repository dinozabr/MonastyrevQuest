<?php
/**
 * Created by PhpStorm.
 * User: pyna
 * Date: 18.01.19
 * Time: 12:18
 */

require __DIR__ . '/vendor/fzaninotto/faker/src/autoload.php';

$link = mysqli_connect("localhost", "root", "madahyryt", "testQuest");

$link->set_charset("utf8");



$faker = Faker\Factory::create('ru_RU');


for ($i=0; $i < 30; $i++) {
    //При генерации ФИО не соблюдается порядок инициалов(ФИО,ИФО,ОФИ и тд)
    $a = $faker->name;
    $explode = explode(" ", $a);
    $s = $explode[0] . " " . mb_substr($explode[1], 0,1) . "." . mb_substr($explode[2],0,1);

    $sql = "INSERT INTO employees (name) VALUES ('$s')";

    if($link -> query($sql)){
        echo "Record added.\n";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) . "\n";
    }

}


mysqli_close($link);
