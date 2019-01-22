<?php
/**
 * Created by PhpStorm.
 * User: pyna
 * Date: 18.01.19
 * Time: 14:08
 */
require __DIR__ . '/vendor/fzaninotto/faker/src/autoload.php';
require __DIR__ . '/config.php';

$link = mysqli_connect($host, $username, $password, $dbname);

$link->set_charset("utf8");

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
        $query = "SELECT name FROM ". $dbname.".employers ORDER BY name";
        $result = $link->query($query);
        while ($line = mysqli_fetch_assoc($result)) {
            $items[] = $line;
        }
        echo $js = json_encode($items, JSON_UNESCAPED_UNICODE);
    }
    else
        if($act->action == 'getListFromEmployer') {
            $query = "SELECT * FROM ". $dbname.".employers ORDER BY name";
            $name = $act->name;
            $head_id = -1;
            $listAll = $link->query($query);
            while ($line = mysqli_fetch_assoc($listAll)) {
                $items[] = $line;
                if ($line['name'] == $name) {
                    $head_id = $line['head_id'];
                }
            }
            $tree=CreateTree($items,$head_id);

            $test_array[$name] = $tree[$name];
            echo json_encode($test_array, JSON_UNESCAPED_UNICODE);
        } else {
                $query = "SELECT * FROM  ". $dbname.". employers ORDER BY name";
                $listAll = $link->query($query);
                while ($line = mysqli_fetch_assoc($listAll)) {
                    $items[] = $line;
                }
                $tree=CreateTree($items,0);
                echo json_encode($tree, JSON_UNESCAPED_UNICODE);
        }












