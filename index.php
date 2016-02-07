<?php
session_start();
if(isset($_SESSION["username"])){
  header("location:home.php");
exit;
}
?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$conn=$db_handle->connectDB();
$error="";

if(isset($_POST['username']) && isset($_POST['password']))
{
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);

  $query=$db_handle->runQuery("SELECT id,username,password FROM doctor where username='$username' and password='$password'");

  if(!empty($query)){
    $_SESSION["id"]=$query[0]['id'];
    $_SESSION["username"]=$query[0]['username'];

    header("location:home.php");
exit;
}else
$error="Invalud username or password";
}


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <style media="screen">
      table{
        margin-top: 250px;
        border: solid red 2px;
        border-radius: 5px;
        padding:50px;
      }
      td{
        padding: 10px;
      }
    </style>
  </head>

  <body>
    <center>
    <table>
      <form class="" action="" method="post">
      <tr>
        <td>
          username :
        </td>
        <td>
          <input type="text" name="username" value="">
        </td>
      </tr>
      <tr>
        <td>
          Password :
        </td>
        <td>
          <input type="password" name="password" value="">
        </td>
        <tr>
          <td>
            <input type="submit" name="submit" value="Login">
          </td>
          <td>
            <?php echo $error; ?>
          </td>
        </tr>
      </tr>
        </form>
    </table>
  </body>
</html>
