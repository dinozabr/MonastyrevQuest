<?php
/**
 * Created by PhpStorm.
 * User: pyna
 * Date: 22.01.19
 * Time: 2:04
 */




if ($_SERVER['SERVER_NAME'] == "thawing-stream-94645.herokuapp.com") {



    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
} else {

    $host = 'localhost';
    $dbname = 'testQuest';
    $username = 'root';
    $password = 'madahyryt';
}