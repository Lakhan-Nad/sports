<?php
$url='127.0.0.1:3306';
$username='root';
$password='';
$db = 'MYDB';
$conn=mysqli_connect($url,$username,$password);
if(!$conn){
 die('Could not Connect My Sql:' .mysqli_error($conn));
}
else{
    // echo "Connection Successful\n";
}
$db_selected = mysqli_select_db($conn,$db);

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = "CREATE DATABASE $db";

  if (mysqli_query($conn,$sql)) {
    //   echo "Database $db created successfully\n";
  } else {
      echo 'Error creating database: ' . mysqli_error($conn) . "\n";
  }
}
else{
    // echo "Already Exist\n";
}
?>