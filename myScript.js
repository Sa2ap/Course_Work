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

    $('#add_evaluation').click(function(){
        var table = document.getElementById('tbl_set_eval');

        $row_count = table.rows.length;

        var str = document.getElementById('teacher_name').innerText;
        var teacher = str.replace(/Teacher :/g, '');

        for($i = 0;$i < $row_count+1;$i++)
        {

            var name = table.rows[$i+1].cells[1].innerHTML;
            var surname = table.rows[$i+1].cells[2].innerHTML;

            var asses = table.rows[$i+1].cells[3].firstChild.value;

            var date = table.rows[$i+1].cells[4].innerHTML;

            $('#groups').load('add_a_note.php',{
                teacherName: teacher,
                group:document.getElementById('group').innerHTML,
                    studentName: name,
                studentSurname: surname,
                date:date,
                asses:asses

                });
        }



    });


    $('#btn_show').click(function() {
        $('#list_group input:checkbox:checked').each(function () {
            $('#groups').load('showStudents.php', {groupName: $(this).val()});

        });
    });

    $('#btn_enter_student').click(function(){

       $('#groups').load('student_menu.php');
$('.student_control').css('display','block');
        $('.control').css('display','none');


    });
});