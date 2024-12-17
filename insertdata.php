<?php include("dbcon.php")?>


<?php
if(isset($_POST['add-btn'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $salary=$_POST['salary'];

    // form validation
    if($name==""||empty($name) && $age==""||empty($age) && $salary==""||empty($salary)){
        header('location:index.php?message= 🤨 ohhh Bro !!! Atleast Fill Full Form ');

    }else{
        $query="INSERT into `emp` (`name`,`age`,`salary`) values ('$name','$age','$salary') ";
        $result=mysqli_query($connection,$query);
        if(!$result){
            die("query failed due to" .mysqli_error($connection));
        }else{
            header('location:index.php?insertmessage= Added 😁 It Seems You Are Expert in Inserting... I Mean Data Inserting 😉');
        }
    }

}

?>