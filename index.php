<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>dmarkdevin.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
   $('input[type="checkbox"]').click(function(){
        var home = 0;
     
        if ($(this).is(':checked')) {
            var home = 1;
       }     
        var id = $(this).val();
        $.ajax({
             url:"update.php",
             method:"POST",
             data:{home:home,id:id,},
             success: function(data){
                alert(data);
            },
       });

   });
});
</script> 


<?php
include('db_connect.php');
$statement = $conn->prepare("SELECT * FROM users"); 
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);      
     
        foreach($results as $result):
            $checked = ($result['name']>0)?'checked':'';
            echo $result['id'].' <input type="checkbox" name="id'.$result['id'].'" id="id" value="'.$result['id'].'" '.$checked.' /> <br>';
        endforeach;
        
?>
</body>
</html>