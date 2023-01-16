<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";

$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));
if(isset($_POST['login']) && isset($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT `teacherID`,`teacherName`, `teacherSurname` FROM `teachers` WHERE `login`='$login' AND `password`= '$password'";

    $result = mysqli_query($link,$query) or die ("Error : ".mysqli_error($link));
if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_row($result);
    echo "<p id='teacherID'>$row[0]</p>";
    echo "Teacher :     ".$row[2]."     ".$row[1];
    echo "<script>
$('.control').css('display','block');
$('.student_control').css('display','none')
</script>";
}
    else
    {
        echo "There is no teacher.";
        echo "<script>
$('.control').css('display','none');
</script>";

}

}
mysqli_close($link);