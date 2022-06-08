<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function fun1() {
            let project = document.getElementById("taskProject").value;
            let date = document.getElementById("taskDate").value;
            let key = project + date;
            let result = localStorage.getItem(key);
            document.getElementById('res').innerHTML = result;
        }

        function fun2() {
            let chief = document.getElementById("allTimeProject").value;
            let key = chief+"1";
            let result = localStorage.getItem(key);
            document.getElementById('res').innerHTML = result;
        }

        function fun3() {
            let chief = document.getElementById("chiefValue").value;
            let key = chief + "2";
            let result = localStorage.getItem(key);
            document.getElementById('res').innerHTML = result;
        }
    </script>
</head>
<form method="get" action="1.php">
<p>Finished tasks: <select name="taskProject" id="taskProject" onchange="fun1()">
        <?php
        include 'db.php';
        $project = $collection->distinct("project");
                foreach ($project as $document) {
                    echo "<option>";
                    print($document);
                    echo "</option>";
                }
        ?>
    </select>
    <select name="taskDate" id="taskDate" onchange="fun1()">
        <?php
        include 'db.php';
        $timeEnd = $collection->distinct("date");
        foreach ($timeEnd as $document) {
            echo "<option>";
            print($document);
            echo "</option>";
        }
        echo '</select>';
        ?>
    </select>
    <button>Get</button></p>
</form>


<form method="get" action="2.php">
   <p>Value of projects of chief: <select name="allTimeProject" id="allTimeProject" onchange="fun2()">
        <?php
        include 'db.php';
        $manager = $collection->distinct("chief");
        foreach ($manager as $document) {
        echo "<option>";
        print($document);
        echo "</option>";
        }
         echo '</select>';
        ?>  
    </select>
    <button>Get</button></p>
</form>


<form method="get" action="3.php">
<p>Value of workers of  <select name="chiefValue" id="chiefValue" onchange="fun3()">
        <?php
        include 'db.php';
        $manager = $collection->distinct("chief");
        foreach ($manager as $document) {
            echo "<option>";
            print($document);
            echo "</option>";
        }
        echo '</select>';
        ?>
    </select>
    <button>Get</button></p>
</form>
<div id="res"></div>
</body>
</html>