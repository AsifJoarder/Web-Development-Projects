<?php include_once 'app/user.php'  ?>
<?php include_once 'app/validation.php'  ?>
<?php
    
    $user = new user();
    $val = new validation();
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Table.php">Data</a>
            </li>
           
        </div>
      </nav>


    <!-- table -->
        
   <?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $user -> singleData($id);
            $data = $row -> fetch_assoc();

        }

          if(isset($_POST['submit'])){

            $name = $_POST['name'];
            
            $email = $_POST['email'];
            $cell = $_POST['cell'];

            $mess = $val -> valUpdate($name,$email,$cell);
            if(!isset($mess)){
                $user -> update($name,$email,$cell,$id);
                header("Location:Table.php");
                
            }


        }

   ?>

 
    <div >
        <div class="card shadow w-50 mx-auto mt-3";>
             <?php
                if(isset($mess)){
                    echo $mess;
                }
            ?>
            <div class="card-header">
                <h2 style="text-align: center;"><b>Edit Data</b></h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input value="<?php echo $data['name'] ?>" name='name' type="text" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input value="<?php echo $data['email'] ?>" name='email' type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cell</label>
                        <input value="<?php echo $data['cell'] ?>" name='cell' type="number" class="form-control">
                    </div>
                    <div class="form-group text-right mt-4">
						<input name="submit" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
                </form>
            </div>
          </div>
    </div>
    





    <script src="asset/js/jquery-3.5.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>
</html>