<?php
session_start();
if(!isset($_SESSION["username"])){
  header("location:index.php");
exit;
}
?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$conn=$db_handle->connectDB();
$table="";
$username=$_SESSION["username"];
//$query="SELECT id,username,name FROM doctor where username='$username'";
$query=$db_handle->runQuery("SELECT id,username,password,name FROM doctor where username='$username'");

if(!Empty($query))
{
  foreach ($query as $key => $row) {
    $id=$row["id"];
    $name=$row["name"];
    $username=$row["username"];
    $password=$row["password"];
}

}else
$table="Empty Data";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <style media="screen">
    *{
      margin: auto;
      padding: 0px;
     }
    nav{
      border-bottom: solid red 3px;
      height: 50px;
    }
      ul{
        list-style: none;
      }
      li a{
        float: left;
        text-decoration: none;
        padding: 10px;
        color: gray;
        font-family: sans-serif;
      }
      li a:hover{
        color: red;
        text-decoration: underline;
      }
.content{
  border-radius: 10px;
  border: solid red 2px;
  margin-top: 20px;
  width: 1000px;
  height: 700px;
  /*background-color: gray;*/
}
.Tprofile{
  margin-left: 10px;
  position:absolute;
}
.Tprofile td{
  padding: 10px;
  border-bottom: solid red 1px;
  font-size: 15pt;
  font-weight: bold;
  font-family: sans-serif;
  color: gray;
}
.Tprofile td input{
padding: 10px;
border-radius: 2px;
color: gray;
}
.imgProfile{
  border-radius: 100px;
}
#button{
  background-color: red;
  color: white;
  border:solid red;

}
#button:hover{
  color: gray;
}
    </style>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <center>
    <div class="content">

    <table class="Tprofile" border="0">
      <form class="" action="index.html" method="post">

    <tr>
      <td colspan="2"><img class="imgProfile" src="image/1.jpg"  width="150" height="150"/></td>
    </tr>
    <tr>
      <td>Username :</td>
      <td><input type="text" name="usernmae" value="<?= $username;?>" disabled></td>
    </tr>
    <tr>
      <td>ID :</td>
      <td><input type="text" name="id" value="<?= $id; ?>" disabled></td>
    </tr>
    <tr>
      <td>Name :</td>
      <td><input type="text" name="name" value="<?= $name; ?>" disabled></td>
    </tr>

    <tr>
      <td>Department :</td>
      <td><input type="tezt" name="dept" value="" disabled></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input id="button" type="button" name="dept" value="Settings"></td>
    </tr>
  </form>

    </table>

    </div>
</center>
  </body>
</html>
