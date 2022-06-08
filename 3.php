<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            include 'db.php';
            $chief = $_GET['chiefValue'];
            $cursor = $collection->find(
                [
                    'chief' => $chief
                ]);
            $key = $chief . "2";
            $count = 0;
            $res = "Workers of chief $chief: ";
            foreach ($cursor as $document) {
                $worker = $document['worker'];
                $chief = $document['chief'];
                if (is_object($worker)) {
                    $worker = (array)$worker;
                    $count = count($worker);
                    $worker = (implode('; ', $worker));
                }
                $res = $res . $worker . ". "; 
            }
            $res = $res . "<p>Quantity of workers: $count</p>";
            echo $res;
            echo "<script> localStorage.setItem('$key', '$res');</script>";
        
    ?>
<?php

?>