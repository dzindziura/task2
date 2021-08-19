<div class='modal fade' id='exampleModal1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Edit user
        </h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form action='' type='post'>
          <label for='fname'>First Name</label>
          <input type='text' name='fname' id='fname' class='form-control mt-2'>
          <label for='lname'>Last Name</label>
          <input type='text' name='lname' id='lname' class='form-control mt-2'>

          <div class='form-check form-switch mt-2'>
            <input class='form-check-input' name='checked_user' type='checkbox'  id='checked_user' value='1'>
            <label class='form-check-label' for='flexSwitchCheckChecked'>Status</label>
          </div>
          <select class='form-select mt-2' id='role_user' name='role_user'>
                    <option value='0'>Role</option>
                    <option value='1'>Admin</option>
                    <option value='2'>User</option>
                  </select>
      </div>
      <div class="alert alert-danger mt-2" id="errorBlock1"></div>
      <div class='modal-footer'>

        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='button' id='edit_user' name='update' class='btn btn-primary' >Save</button>

      </div>
          </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('#errorBlock1').hide();
$('#edit_user').click(function(){
  var fname = $('#fname').val();
  var lname = $('#lname').val();
  var checked_user = $('#checked_user');
  var role_user = $('#role_user');
  var myID = $('#inpID');



  $.ajax({
    url: 'ajax/edit.php',
    type: 'POST',
    cache: false,
    data: {'fname': fname, 'lname': lname, 'checked_user': checked_user, 'role_user': role_user},
    dataType: 'html',
    success: function(data){
      if(data == 'Готово'){
        $('#edit_user').text("Готово");
        document.location.reload();
      }else{
        $('$errorBlock1').show();
        $('#errorBlock1').text(data);
      }
    }
  });
});

</script>
