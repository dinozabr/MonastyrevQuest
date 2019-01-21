<?php
/**
 * Created by PhpStorm.
 * User: pyna
 * Date: 22.01.19
 * Time: 2:04
 */




if ($_SERVER['SERVER_NAME'] == "thawing-stream-94645.herokuapp.com") {
    echo 'i am here';
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b96f3dfb1de729';
    $password = '015e215c';
    $dbname = 'heroku_49c5e89e0448e08';
} else {

    $host = 'localhost';
    $dbname = 'testQuest';
    $username = 'root';
    $password = 'madahyryt';
}