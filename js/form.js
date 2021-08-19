$('inpID').on('click', function(){
  var fname = $('#fname').val().trim();
  var lname = $('#lname').val().trim();
  var checked_user = $('#checked_user').val().trim();
  var role_user = $('#role_user').val().trim();
  var myID = $('editID');

  if(fname == ''){
    $('errorBlock1').text('Enter your First Name');
    return false;
  }else if(lname == ''){
    $('errorBlock1').text('Enter your Last Name');
    return false;
  }

  $.ajax({
    url: 'ajax/edit.php',
    type: 'POST',
    cache: false,
    data: {'firstName': fname, 'LastName': lname, 'checked': checked_user, 'role': role_user, 'id': myID},
    success: function(){
      if(data == 'Готово')Х
      $('errorBlock1').text('Готово');
      document.location.reload();
    }else{
      $('errorBlock1').text(data);
    }
  })

})
