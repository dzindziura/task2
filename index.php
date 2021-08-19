<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>table user list - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src='js/script.js' charset='utf-8'></script>
<link rel="stylesheet" href="css/main.css">
</head>

<body>
<hr>
<div class='container'>
  <div class="row">
    <div class="col-1">
      <button type='button' class="btn btn-success" data-bs-toggle='modal' data-bs-target='#exampleModal'>
        ADD
      </button>
    </div>
    <div class="col-2">
      <select class="form-select" aria-label="Default select example">
  <option selected>Please select</option>
  <option value="1">Set active</option>
  <option value="2">Set not active</option>
  <option value="3">Delete</option>
</select>

    </div>
    <div class="col-2"><button type='button' class="btn btn-success" data-bs-toggle='modal' data-bs-target='#exampleModal'>
      OK
    </button></div>
  </div>


  <table class='table user-list'>
      <thead>
      <tr>
      <th><input class='form-check-input check_all' type='checkbox' value='' id="check_all">
      <th><a id='dd3'>First Name</a></th>
      <th><span>Last Name</span></th>
      <th><span>Status</span></th>
      <th><span>Role</span></th>
      <th><span>Option</span></th>
      </tr>
      </thead>
  <?php
    require 'mysql_connect.php';

    $sql = 'SELECT * FROM `connect` ORDER BY `time` DESC';
    $query = $pdo->query($sql);

    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
      if($row->checked == '1'){
      $chk = "<image src='img/tasks.png'>";
    }else if($row->checked == ''){
          $chk = "<image src='img/tasks1.png'>";
      }
      if($row->role == 1){
        $role = 'admin';
      }else{
        $role = 'user';
      }
      $var = $row->id;
  echo  "
  <tbody>
      <tr>
      <td style='width:30px'><input class='form-check-input'  type='checkbox' value='' id='check'>
      <td>$row->firstName</td>
      <td>$row->lastName</td>
      <td>$chk</td>
      <td>$role</td>
      <th>
      <div class='row'><div class='col-1'>
                              <form action='ajax/delete.php' method='post'>
                              <input type='hidden' name='id' value='$var'/>
                              <input type='submit' value='' class='mt-2' style='background-image: url(img/trash.png);background-repeat: no-repeat;border: none;width: 16px;height: 16px;'/>
                              </form>
                              </div>
                              <div class='col-1'>

                              <input type='hidden' id='inpID'></input>
                              <input data-bs-toggle='modal' data-bs-target='#exampleModal1'  value='' class='mt-2' style='background-image: url(img/pencil.png);background-repeat: no-repeat;border: none;width: 16px;height: 16px;'>
                              </input>
                              </div></div></th>
        ";
    }
    ?>

</tr></tbody></table>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <?php require 'blocks/add_user.php'?>
  <?php require 'blocks/edit.php'?>
  <div class="row">
    <div class="col-1">
      <button type='button' class="btn btn-success" data-bs-toggle='modal' data-bs-target='#exampleModal'>
        ADD
      </button>
    </div>
    <div class="col-2">

      <select class="form-select" aria-label="Default select example">
  <option selected>Please select</option>
  <option value="1">Set active</option>
  <option value="2">Set not active</option>
  <option value="3">Delete</option>
</select>

    </div>
    <div class="col-2"><button type='button' class="btn btn-success">
      OK
    </button></div>
  </div>
</div>



</body>
</html>
