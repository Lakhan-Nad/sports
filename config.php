<?php
include("database.php");
$create_user = "CREATE TABLE USER(
    email varchar(50) PRIMARY KEY,
    firstName varchar(30) NOT NULL,
    lastName varchar(30) NOT NULL,
    pass varchar(30) NOT NULL,
    phone varchar(10) NOT NULL,
    hockey varchar(30),
    football varchar(30),
    cricket varchar(30),
    basketball varchar(30),
    swimming varchar(30),
    tabletennis varchar(30),
    check(phone REGEXP '^[6789][0-9]{9}$')
    )";
if(mysqli_query($conn,$create_user)){
    echo "Table Created Successfully";
}
else{
    echo mysqli_error($conn)."\n";
}
// mysqli_query($conn,"DELETE FROM USER");
// mysqli_query($conn,"DROP TABLE USER");
?>