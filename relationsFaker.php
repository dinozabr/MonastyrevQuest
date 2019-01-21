<?php
/**
 * Created by PhpStorm.
 * User: pyna
 * Date: 18.01.19
 * Time: 14:08
 */
require __DIR__ . '/vendor/fzaninotto/faker/src/autoload.php';
require __DIR__ . '/config.php';

//$link = mysqli_connect("localhost", "root", "madahyryt", "testQuest");
//$link->set_charset("utf8");
$link = mysqli_connect($host, $username, $password, $dbname);
print_r($link);
$link->set_charset("utf8");
$act =$_POST['action'];
$act = json_decode($_POST['data']);
$items = Array();
$items1 = Array();

function CreateTree($array,$sub)
{
    $a = array();

    foreach($array as $v)
    {
        if($sub == $v['head_id'])
        {
            $b = CreateTree($array,$v['id']);
            if(!empty($b))
                $a[$v['name']] = $b;
            else
                $a[$v['name']] = $b;
        }

    }


    return $a;
}


if ($act->action == 'getListName') {
    $query = "SELECT name FROM testQuest.employers";

    $result = $link->query($query);
    while ($line = mysqli_fetch_assoc($result)) {
        $items[] = $line;
    }
    echo $js = json_encode($items, JSON_UNESCAPED_UNICODE);
}
else  if($act->action == 'getListFromEmployer')
    {
        $name = $act->name;

        $query = "SELECT * FROM testQuest.employers";
        $name = $act->name;
        $idEmployer = -1;
        $head_id = -1;

        $listAll = $link->query($query);


        while ($line = mysqli_fetch_assoc($listAll)) {
            $items[] = $line;
            if ($line['name'] == $name) {
                $idEmployer = $line['id'];
                $head_id = $line['head_id'];
            }

        }


        $tree=CreateTree($items,$head_id);
        //print_r($firstElement);
        //array_unshift($tree,$firstElement,);
        //print_r($firstElement);
        $test_array[$name] = $tree[$name];
//        $test_array= $tree[$name];

        //print_r($test_array);
        echo json_encode($test_array, JSON_UNESCAPED_UNICODE);



    }
    else {
        $query = "SELECT * FROM testQuest.employers";

        $result = $link->query($query);


        while ($line = mysqli_fetch_assoc($result)) {
            $items[] = $line;
        }
        $tree=CreateTree($items,0);
        echo json_encode($tree, JSON_UNESCAPED_UNICODE);
    }












