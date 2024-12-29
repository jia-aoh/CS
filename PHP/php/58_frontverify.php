<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

  function checkAccount(){
    $('#mesg').load('checkAccountFront.php?account=' + $('#account').val()); //load去後端抓訊息
  }
</script>

<form action="58_loginverifyback.php" method="post" enctype="multipart/form-data">
  Account: <input name="account" onblur="checkAccount()" id="account">
  <span id="mesg"></span><br>
  Password: <input type="password" name="passwd"><br>
  Name: <input name="name"><br>
  Icon: <input type="file" name="icon"><br>
  <input type="submit" value="Register">
</form>