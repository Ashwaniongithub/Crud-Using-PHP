<?php include("dbcon.php") ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<!-- getting access of data by id  -->
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $query="select * from `emp` where `id`='$id'";
    $result=mysqli_query($connection, $query);
    if(!$result){
        die("query failed due to " . mysqli_error($connection));
    }else{
        $row=mysqli_fetch_assoc($result);
    }
} 
?>


<!-- updating the data we get -->
 <?php
 if(isset($_POST['update-btn'])) {
    if(isset($_GET['id_new'])){
        $id_new=$_GET['id_new'];
    }
    $name=$_POST['name'];
    $age=$_POST['age'];
    $salary=$_POST['salary'];

    $query="Update `emp` set `name`='$name',`age`='$age' ,`salary`='$salary' where `id`='$id_new'";
    $result = mysqli_query($connection , $query);

    if(!$result){
        die("query failed due to" . mysqli_error($connection));
    }else{
        header('location:index.php?updatemsg= 😎 Updated.. As You Wished For');
    }
 }
 ?>

<h1 class="bg-black text-center text-white p-3">CRUD USING PHP</h1>
<h3 class="text-center mt-3">Update Your Emp</h3>
<div class="container">
    <form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">name</label>
                    <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="exampleInputEmail1" > 
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">age</label>
                    <input type="number" name="age" value="<?php echo $row['age'] ?>" class="form-control" id="exampleInputEmail1"> 
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">salary</label>
                    <input type="number" name="salary" value="<?php echo $row['salary'] ?>" class="form-control" id="exampleInputEmail1"> 
                </div>
                <button type="submit" name="update-btn" class="btn btn-dark">update</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
