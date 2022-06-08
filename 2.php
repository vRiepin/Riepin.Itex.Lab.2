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
    $chief = $_GET['allTimeProject'];
    $cursor = $collection->aggregate([
        ['$match' => ['chief' => $chief]],
        ['$group' => ['_id' => '$project']],
        ['$count' => 'count']
    ]);
    $key = $chief . "1";
    $res = "Value of projects of chief $chief: ";
    foreach ($cursor as $document) {
        if (is_object($document)) {
            $document = (array)$document;
            $document = (implode('', $document));
        }
        $res = $res . $document;    
    } 
    echo $res;
    ?>
    <?php
    echo "<script> localStorage.setItem('$key', '$res');</script>";
    ?>