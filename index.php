<?php include("dbcon.php") ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Manrope:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <style>
        *{
            font-family: Kanit !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="bg-black text-center text-white p-3">CRUD USING PHP</h1>
    
    <div class="text-center d-flex justify-content-center gap-3">
        <a href="https://github.com/Ashwaniongithub">
            <img height="30px" src="https://cdn-icons-png.flaticon.com/128/270/270798.png" alt="github">
        </a>
        <a href="https://www.linkedin.com/in/ashwani-hada-130916336/">
            <img height="30px" src="https://cdn-icons-png.flaticon.com/128/2504/2504923.png" alt="linkdin">
        </a>
    </div> 

    <h3 class="text-center mt-5">Employee Table</h3>
    <p class="text-center">Manage Your Employees</p>
    <div class="container mt-5 ">
                        <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Employee +
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Emp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="insertdata.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" > 
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">age</label>
                    <input type="number" name="age" class="form-control" id="exampleInputEmail1"> 
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">salary</label>
                    <input type="number" name="salary" class="form-control" id="exampleInputEmail1"> 
                </div>
                <button type="submit" name="add-btn" class="btn btn-primary">Submit</button>
                </form>
                </div>
                </div>
            </div>
            </div>
            
            <div class="m-3">
            <?php
            // Check for messages and display them in a Bootstrap alert
            if (isset($_GET['message'])) {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">'
                    . htmlspecialchars($_GET['message']) .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if (isset($_GET['insertmessage'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                    . htmlspecialchars($_GET['insertmessage']) .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if (isset($_GET['deletemsg'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    . htmlspecialchars($_GET['deletemsg']) .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if (isset($_GET['updatemsg'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                    . htmlspecialchars($_GET['updatemsg']) .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            </div>

       <div class="table-responsive">
       <table class="table table-primary table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Salary</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query="select * from `emp`";
                $result=mysqli_query($connection,$query);
                if(!$result){
                    die("Query failed due to" .mysqli_error($connection));
                }else{
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <th><?php echo $row['id']; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['salary']; ?></td>
                                <td><a href="update_page.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Update</a>
                                <a href="delete_data.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        <?php
                    }
                }
                 ?>
               
            </tbody>
        </table>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>