<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";

$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));


$query = "SELECT teacherId,groupId,studentName,studentSurname,date,assessment FROM `journal` ";


$result = mysqli_query($link,$query)or die(mysqli_error($link));


if($result)
{
    $rows = mysqli_num_rows($result); 

    echo "<h4 id='group'>$groupName</h4>";
    echo "<table class='table table-bordered' id='tbl_set_eval'>
<tr>
<th>Teacher</th>
<th>Group</th>
<th>Name</th>
<th>Surname</th>
<th>Date</th>
<th>Assessment</th>
</tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);


        echo "<tr>";
        for ($j = 0; $j < 6;$j++)
        {
            echo "<td>$row[$j]</td>";
        }

        echo "</tr>";
    }
    echo "</table>";

}
mysqli_close($link);