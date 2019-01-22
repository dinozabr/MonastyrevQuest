<?php
/**
 * Created by PhpStorm.
 * User: pyna
 * Date: 22.01.19
 * Time: 2:04
 */




if ($_SERVER['SERVER_NAME'] == "mighty-shelf-66755.herokuapp.com") {
    $host = 'us-cdbr-iron-east-03.cleardb.net';
    $username = 'bdcf4b6759d365';
    $password = '3ecbf07';
    $dbname = 'heroku_7af04bb30d5d26c';
} else {

    $host = 'localhost';
    $dbname = 'testQuest';
    $username = 'root';
    $password = 'madahyryt';
}