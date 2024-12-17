<?php include("dbcon.php") ?>

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

$query="DELETE from `emp` where `id`='$id'";
$result=mysqli_query($connection,$query);

    if(!$result){
        die("query failed".mysqli_error($connection));
    }else{
        header('location:index.php?deletemsg= 👻 Data Deleted ...!!');
    }
} 
?>