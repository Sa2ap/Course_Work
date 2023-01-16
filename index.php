<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="myStyle.css">
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="myScript.js"></script>
    <title></title>
</head>
<body>
<div class="general">
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div id="autorisation" class="dropdown">
        <button class="btn btn-info" type="button" data-toggle="dropdown" >Преподаватель</button>
        <button class="btn btn-info" type="button" id="btn_enter_student">Студент</button>
        <div class="dropdown-menu">
            <form class="form-horizontal">
                <h4>Авторизация</h4>
                <br>
                <div class="form-group">
                    <label for="inputLogin" class="col-sm-3 control-label">Логин</label>
                    <div class="col-sm-8">
                        <input required="required" type="text" name="login" class="form-control" id="inputLogin" placeholder="логин">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPass" class="col-sm-3 control-label">Пароль</label>
                    <div class="col-sm-8">
                        <input type="text" required="required" name="password" class="form-control" id="inputPass" placeholder="пароль">
                    </div>
                </div>
                <li class="divider"></li>
            </form>
            <div class="form-group">
                <div class="col-sm-offset-7 col-sm-5">
                    <button type="button" class="btn btn-success" id="btnIn">Войти</button>
                </div>
            </div>
        </div>
    </div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="teacher">

        <div id="teacher">
            <h4 id="teacher_name"></h4>
            <h4 id="group_name"></h4>
            <div id="groups">

            </div>

        </div>
</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="control">
        <!--<div class="dropdown">-->
            

            <button class="btn btn-success" id="btn_set_evaluation">Выставить оценки</button>
                <button class="btn btn-success" id="btn_show_info">Просмотр</button>


    </div>

    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    
</div>





</body>
</html>