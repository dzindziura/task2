<?php

  $firstName = trim(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
  $lastName = trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
  $checked = $_POST['checked'];
  $role = $_POST['role'];
  $error='';

  if(strlen($firstName) <= 3)
    $error = 'Enter your first name';
  else if(strlen($lastName) <= 3)
    $error = 'Enter your last name';


    if($error!=''){
      echo $error;
      exit();
    }

    require '../mysql_connect.php';

    $sql = 'INSERT INTO connect(firstName, lastName, checked, role, time) VALUES(?,?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$firstName, $lastName, $checked,$role, time()]);


    echo "Готово";
?>
