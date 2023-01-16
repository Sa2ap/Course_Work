# Course_Work
Электронный Журнал 
Отчёт по курсовой работе
========================
*по курсу Основы программирования*  

выполнила:Кудряшов А.Е. 3132 группа  
преподаватель: Жиданов К.А.

Санкт-Петербург, 2023 г. 

#### Изучение предметной области
------------------------
Реализовать Электронный журнал  

В моем проекте реализован не сложный элетронный дневник для разделенный на группы и преподавателей , а так же система выставления оценок 
#### Техническое задание
------------------------
- Проектирование дизайна;
- Верстка сайта;
- Создание клинт-серверной части;
- Публикация проекта благодаря бесплатному хостингу.

#### Выбор технологии
------------------------
*Среда разработки:* SublineText, MAMP 
*Инструменты:* PHP 8.0, MySQL-8.0, PhpMyAdmin, JS  
*Фреймворк:* Bootstrap 5  

#### Процесс реализации
------------------------
#### Интерфейс
Интерфейс авторизащии для преподавателей
![Интерфейс авторизащии для преподавателей](https://github.com/Sa2ap/Course_Work/blob/main/k1.PNG)
Основной интерфейс для студентов
![Основной интерфейс для студентов ](https://github.com/Sa2ap/Course_Work/blob/main/k2.PNG)
Просмотр оценок групп
![Просмотр оценок групп ](https://github.com/Sa2ap/Course_Work/blob/main/k3.PNG)
Просмотр оценок групп
![Просмотр оценок групп ](https://github.com/Sa2ap/Course_Work/blob/main/k4.PNG)
Выставление оценок
![Выставление оценок ](https://github.com/Sa2ap/Course_Work/blob/main/k5.PNG)

#### 2. Пользовательский сценарий работы
Пользователь попадает на главную страницу **index.php**. 
Далее если это преподаватель он может авторизироваться и либо выставить оценки либо просмотреть уже выставленный .
Если это студент то он может просмотреть оценки.

#### 3. API сервера и хореография

#### 4. Структура базы данных

 Таблица *groups*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT  |  | NO | Автоматический идентификатор поста |
| **groupName** | VARCHAR	 | 100 | NO | Имя Группы |
| **numberPerson** | INT| 11 | NO | Количество человек |

Таблица *journal*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **id** | INT  |  | NO | Автоматический идентификатор пользователя |
| **teacherId** | TEXT |  | NO | Администратор/не администратор |
| **groupId** | VARCHAR | 255 | NO | Логин пользователя |
| **studentName** | VARCHAR | 150 | NO | Почта пользователя |
| **studentSurname** | VARCHAR | 255 | NO | Хэшированный пароль |
| **date** | DATETIME |  | CURRENT_TIMESTAMP | Дата создания |
| **assessment** | 	INT  | 11 | Дата создания |

Таблица *students*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **studentid** | INT  |  | NO | Автоматический идентификатор комментария |
| **studentName** |  VARCHAR | 100 | YES | ID поста |
| **studentSurname	** | VARCHAR | 100 | NO | Почта пользователя |
| **groupName** | VARCHAR |  | 100 | Содержание комментария |

Таблица *topics*
| Название | Тип | Длина | NULL | Описание |
| :------: | :------: | :------: | :------: | :------: |
| **teacherID** | INT  |  | 100 | Автоматический идентификатор категории |
| **teacherName** |VARCHAR  |  | 200 | Автоматический идентификатор категории |
| **teacherSurname** | VARCHAR | 200 | NO | Название категории |
| **login** | VARCHAR |  | 100 | Описание категории |
| **password* | VARCHAR |  | 100 | Описание категории |


#### 5. Алгоритм
**Алгоритм работы сайта **  
![Работа сацта ](https://github.com/Sa2ap/Course_Work/blob/main/k6.PNG)  




#### 6. Значимые фрагменты кода

**Обработка**
```js
$(document).ready(function(){

   $('#btnIn').click(function(){
      $('#teacher_name').load('autorisation.php',{login : document.getElementById('inputLogin').value
         ,password  :document.getElementById('inputPass').value});

   });
  
   $('#btn_take_group').click(function(){
         $('#groups').load('groups.php',{idAction: 'addGroup'});

   });

    
 $('#btn_add').click(function() {

     $('#list_group input:checkbox:checked').each(function(){

         if(confirm('You want to add a group  - '+$(this).val()))
         {
             $('#groups').load('addGroupOfTeachers.php',{groupId:$(this).val(),
                 teacherId:document.getElementById('teacherID').innerHTML});

         }

     });
 });

    $('#btn_set_evaluation').click(function(){

        $('#groups').load('groups.php',{idAction: 'setEval',
            teacherID:document.getElementById('teacherID').innerHTML});
    });

    $('#btn_show_info').click(function(){

        $('#groups').load('groups.php',{idAction: 'show',
            teacherID:document.getElementById('teacherID').innerHTML});
    });

   
    $('#btn_select').click(function(){
        $('#list_group input:checkbox:checked').each(function(){
       $('#groups').load('setEvaluation.php',{groupName:$(this).val()});

        });
    });
```

**Просмотр оценок для преподователя **
```php
else if($_POST['idAction'] == 'setEval' && isset($_POST['teacherID']))
    {
        $teacherID = $_POST['teacherID'];

       $query_1 = "SELECT `groupId` FROM `journal` WHERE `teacherId`= $teacherID";

        $result_1 = mysqli_query($link,$query_1) or die('Error'.mysqli_error($link));

        $rows_1 = mysqli_num_rows($result_1);
        if($rows_1 > 0) {
            echo "<h3>List of groups</h3>";
            echo "<ul id='list_group'>";
            for ($i = 0; $i < $rows_1; ++$i) {

                $row_1 = mysqli_fetch_row($result_1);

                $query_2 = "SELECT `groupId`,`groupName` FROM `groups` WHERE `groupId`=$row_1[0]";

                $result_2 = mysqli_query($link, $query_2) or die('Error' . mysqli_error($link));

                $rows_2 = mysqli_num_rows($result_2);

                if ($rows_2 > 0) {


                    for ($j = 0; $j < $rows_2; ++$j) {
                        $row_2 = mysqli_fetch_row($result_2);


                        echo "<input type='checkbox' id='check' value=$row_2[1]>";

                        echo $row_2[1];

                        echo "<br>";
                    }


                }

            }
            echo "</ul>";
            echo "<button class='btn btn-success' id='btn_select'>select</button>";
        }
        else
            echo "No groups have this teacher";
    }
```

**Авторизация**
```<?php
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
**Выставление оценок**
```<?php
include 'connecting.php';
echo "<meta charset='utf-8'>";
echo "<script src='myScript.js'></script>";


$link = mysqli_connect($host,$user,$password,$database) or die("Error:  ".mysqli_error($link));

$teacher = $_POST['teacherName'];
$group = $_POST['group'];
$studentName = $_POST['studentName'];
$studentSurname = $_POST['studentSurname'];
$date = $_POST['date'];
$assessment = $_POST['asses'];


$query = "INSERT INTO `journal`(`teacherId`, `groupId`, `studentName`, `studentSurname`, `date`, `assessment`)
VALUES ('$teacher','$group','$studentName','$studentSurname','$date',$assessment)";

$result = mysqli_query($link,$query) or die(mysqli_error($link));



if($result)
{
    echo "Add   ".mysqli_num_rows($result)."   nodes";
}
mysqli_close($link);
```
#### Тестирование
-------------------
После реализации проекта было выполнено smoke-тестирование (проверка ключевых функций проекта). Результаты показали ожидаеммые ответы, как на ошибочные данные, так и на корректные.

#### Внедрение
------------------
Проект был опубликован в Интрнете через хостинг TimeWeb. Файловая организация анологична, как и в локальном. Структура баззы данных была импортированна и имеет идентичный вид.  
**Доступ к проекту:** [journal.ci24187.tw1.ru
](http://journal.ci24187.tw1.ru/)
