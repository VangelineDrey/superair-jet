<?php 
$conn = mysqli_connect("localhost","root","","oska");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows=[];
    while ($row= mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}
    function registrasi($data){
        global $conn;
        $name= strtolower(stripslashes($data["name"]));
    $password= mysqli_real_escape_string($conn,($data["password"]));
    $password2= mysqli_real_escape_string($conn,($data["password2"]));
    
    $result= mysqli_query($conn,"SELECT name FROM users WHERE 
    name = '$name'"); 
    if (mysqli_fetch_assoc($result)){
        echo "<script> alert('nama sudah terpakai') </script>";
        return false;
    }

    if($password !== $password2){
        echo"<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    } 

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users VALUES('','$name','$password')");

    return mysqli_affected_rows($conn);
    }
?>