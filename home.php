<?php
session_start();
if(!isset($_SESSION["username"])){
  header("location:index.php");
exit;
}
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
         color:gray;
       }
       li a:hover{
         color: red;
       }
     </style>
   </head>
   <body>
     <nav>
       <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="Profile.php">Profile</a></li>
         <li><a href="logout.php">Logout</a></li>
       </ul>
     </nav>




   </body>
 </html>
