<?php
$conn=mysqli_connect("localhost", "root", "", "wealth_integrity");
// $conn=mysqli_connect("localhost", "uvtzq4jkgg2wo", "4qejjehv82i4", "dbqkorf7nkz1o8");
if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    exit();
}
