<?php
  include_once "app/user.php";
  $user = new user();
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mess = $user -> uDel($id);
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
   
    <!-- navbar -->
    
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="index.php"><img style="width: 40px;" src="asset/img/273-2734196_registration-logo-hd-png-download.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Table.php">Data</a>
            </li>
           
        </div>
      </nav>

      



    <!-- table -->



    <table class="table table-striped table-hover w-75 mx-auto mt-3">
      <?php if (isset($mess)) {
        echo $mess;
      } ?>

      <?php
        session_start();
        if(isset($_SESSION['umess'])){
          
          echo $_SESSION['umess'];
          session_destroy();
        }

      ?>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">User name</th>
            <th scope="col">Email</th>
            <th scope="col">Cell</th>
            <th scope="col">Options</th>

          </tr>
        </thead>
        <tbody>
          <?php

              $rows = $user -> showData();
              while($data = $rows -> fetch_assoc()){

          ?>
          <tr>
            <th scope="row"><?php echo $data['Sl']  ?></th>
            <td><?php echo $data['name']  ?></td>
            <td><?php echo $data['username']  ?></td>
            <td><?php echo $data['email']  ?></td>
            <td><?php echo $data['cell']  ?></td>
            <td>
              <a href="?id=<?php echo $data['Sl']; ?>" class="btn btn-sm btn-danger">Delete</a>
              <a href="Edit.php?id=<?php echo $data['Sl']; ?>" class="btn btn-sm btn-info">Edit</a>
            </td>
            

          </tr>
        <?php } ?>
         
        </tbody>
      </table>




    <script src="asset/js/jquery-3.5.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>
</html>