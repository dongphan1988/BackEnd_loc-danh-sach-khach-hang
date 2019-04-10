<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: center;
        border: 1px solid lightcoral;
    }
    #submit {
        background: lightsteelblue;
        font-size: 30px;
    }
    input[type=date] {
        background: lightsalmon;
        width: 300px;
    }
</style>
<body>
<form method="post">
    FROM <input type="date" name="from"/>
    TO <input type="date" name="to"/>
    <input type="submit" id="submit" value="SEACH"/>
    <table border="1">
        <caption ><h2  style="background: aqua">LIST CUSTOMER</h2></caption>
        <tr>
            <th bgcolor="#b0c4de">ID</th>
            <th bgcolor="#7fffd4">NAME</th>
            <th bgcolor="#7fffd4">BIRTHDAY</th>
            <th bgcolor="#7fffd4">ANDRESS</th>
            <th width="300px" bgcolor="#7fffd4">IMAGE</th>
        </tr>
        <?php

        $listCustomer = array(
            "1" => array("name" => "Trần Huyền Trang", "birthday" => "1990-08-20", "andress" => "Bắc Giang", "image" => "img/trantrang.jpg"),
            "2" => array("name" => "Phan Kiều Oanh", "birthday" => "1995-02-11", "andress" => "Cần Thơ", "image" => "img/anh2.jpg"),
            "3" => array("name" => "Hoàng Thu Huyền", "birthday" => "1996-05-23", "andress" => "Cần Thơ", "image" => "img/anh3.jpg"),
            "4" => array("name" => "Phan Mỹ Tuyết", "birthday" => "1999-05-12", "andress" => "Cần Thơ", "image" => "img/anh4.jpg")
        );
        ?>
        <?php if (count($listCustomer) === 0): ?>
            <h1>LIST EMPTY</h1>
        <?php endif; ?>
        <?php
        $from = $_POST["from"];
        $to = $_POST["to"];
        $arraySeach = [];
        if (empty($from) || empty($to)) {
            $arraySeach = $listCustomer;
        } else {
            foreach ($listCustomer as $index => $custome) {
                if (strtotime($custome["birthday"]) >= strtotime($from) && strtotime($custome["birthday"]) <= strtotime($to)) {
                    array_push($arraySeach, $listCustomer[$index]);
                }
            }
        }
        ?>
        <?php foreach ($arraySeach as $index => $custome): ?>
            <tr>
                <th bgcolor="#b0c4de"><?php echo $index + 1 ?></th>
                <th bgcolor="#fff8dc"><?php echo $custome["name"]; ?></th>
                <th bgcolor="#fff8dc"><?php echo $custome["birthday"]; ?></th>
                <th bgcolor="#fff8dc"><?php echo $custome["andress"]; ?></th>
                <th bgcolor="#ffe4e1">
                    <div><img src="<?php echo $custome["image"]; ?>" width=15% style="width: 100px"></div>
                </th>

            </tr>
        <?php endforeach; ?>
</form>
</body>
</html>