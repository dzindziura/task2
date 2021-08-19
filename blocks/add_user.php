<!-- class="modal fade" -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=""  method="post">
          <label for="firstName">First Name</label>
          <input type="text" name="firstName" id="firstName" class="form-control mt-2">
          <label for="lastName">Last Name</label>
          <input type="text" name="lastName" id="lastName" class="form-control mt-2">
          <div class="form-check form-switch mt-2">
            <input class="form-check-input" name="checked" type="checkbox"  id="checked" value="1">
            <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
          </div>
          <select class="form-select mt-2" id="role" name="role">
                    <option value="0">Role</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>
      </div>
      <div class="alert alert-danger mt-2" id="errorBlock"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='close'>Close</button>
        <button type="button" class="btn btn-primary" id="add_user">Save</button>

      </div>
    </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#errorBlock').hide();
  $('#add_user').click(function(){
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var checked = [];

    $('#checked').each(function(){
        if(this.checked) {
            checked.push($(this).val());
        }else if($(this).hasClass('text')){
            checked.push($(this).val());
        }
    });

    checked = checked.toString();
    var role = $('#role').val();

    $.ajax({
      url: 'ajax/add.php',
      type: 'POST',
      cache: false,
      data: {'firstName': firstName, 'lastName': lastName, 'checked': checked, 'role': role},
      dataType: 'html',
      success: function(data){
        if(data == 'Готово'){
          $('#add_user').text("Готово");
          document.location.reload();
        }else{
          $('#errorBlock').show();
          $('#errorBlock').text(data);
        }
      }
    });
  });

</script>
