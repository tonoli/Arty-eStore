<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin login</title>
      <link rel="stylesheet" href="../styles/log_style.css">
</head>

<body>
  <html lang="en-US">
<head>
  <meta charset="utf-8">
    <title>Admin l
      ogin</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">

</head>
    <div id="login">
    <h2 style = "text-align: center">  <?php echo @$_GET['not_admin']; ?></h2>
    <h2 style = "text-align: center">  <?php echo @$_GET['logged_out']; ?></h2>

      <form method = "post" action= "login.php">
        <span class="fontawesome-user"></span>
          <input type="text" id="user" name="email" placeholder="Email" required>

        <span class="fontawesome-lock"></span>
          <input type="password" id"pass" name="pass" placeholder="Password"required>

        <input type="submit" name = "login" value="login">

</form>


</body>
<?php
include ("../includes/db.php");
  if (isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass= mysqli_real_escape_string($conn, $_POST['pass']);
    $sel_user = "select * from admin where admin_email = '$email' AND admin_pass = '$pass'";
    echo $sel_user;
    $run_user = mysqli_query($conn, $sel_user);
    $rowcount=mysqli_num_rows($run_user);
    if (mysqli_num_rows($run_user) != 0)
    {
      $_SESSION['admin_email'] = $email;
      echo "<script> window.open('index.php?logged_in=You have succesfully logged_in!', '_self') </script>";
    }
    else {
      echo "<script> alert('Password or email is wrong, try again')</script>";
    }
  }
?>
