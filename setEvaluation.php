<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";



$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

$groupName = $_POST['groupName'];

$query = "SELECT studentId,studentName,studentSurname FROM `students` WHERE `groupName`='$groupName'";

$result = mysqli_query($link,$query)or die(mysqli_error($link));


if($result)
{
    $rows = mysqli_num_rows($result); // êîëè÷åñòâî ïîëó÷åííûõ ñòðîê

    echo "<h4 id='group'>$groupName</h4>";
    echo "<table class='table table-bordered' id='tbl_set_eval'><tr><th>Id</th><th>Name</th><th>Surname</th><th>Assessment</th><th>Date</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);


        echo "<tr>";
        for ($j = 0 ; $j < 3 ;$j++)
        {
            echo "<td>$row[$j]</td>";
        }

        echo "<td><input type='text' value='' style='width: 50px'></td>";
        $date_today = date('d.m.y');
        echo "<td>$date_today</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button class='btn btn-success' id='add_evaluation'>Save</button>";
}



mysqli_close($link);