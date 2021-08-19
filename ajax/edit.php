<?php
$fname = trim(filter_var($_POST['fname'], FILTER_SANITIZE_STRING));
$lname = trim(filter_var($_POST['lname'], FILTER_SANITIZE_STRING));
$checked_user = $_POST['checked_user'];
$role_user = $_POST['role_user'];
$error='';

if(strlen($fname) <= 3)
  $error = 'Enter your first name';
else if(strlen($lname) <= 3)
  $error = 'Enter your last name';


  if($error!=''){
    echo $error;
    exit();
  }

  require '../mysql_connect.php';

    $sql = "UPDATE connect SET firstName='$fname', lastName='$lname', checked='$checked', role='$role_user' WHERE id = 95";
    $query = $pdo->prepare($sql);
    $query->execute([$fname]);


    echo "Готово";
 ?>
