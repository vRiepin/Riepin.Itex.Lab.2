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
        $project = $_GET['taskProject'];
        $date = $_GET['taskDate'];
        $key = $project . $date;
        $cursor = $collection->find(
            [
            'project' => $project,
            'date' => $date
            ]);
        $res = "<ol>";
        foreach ($cursor as $document) {
            $task = $document['task'];
            $worker = $document['worker'];
            $chief = $document ['chief'];
            if (is_object($worker)) {
                $worker = (array)$worker;
                $worker = (implode(', ', $worker));
            }

          $res .= "<li>Project: $project, task: $task, worker(s): $worker, date:  $date</li>";  
        }
        $res .= "</ol>";
        echo $res;
        echo "<script> localStorage.setItem('$key', '$res'); </script>";
        ?>
    </tbody>
</table>
<?php
?>