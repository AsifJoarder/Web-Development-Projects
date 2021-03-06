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



    <?php

        if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $cell = $_POST['cell'];

            $mess = $val -> validate($name,$uname,$email,$cell);
            if(!isset($mess)){
                $mess = $user -> toDb($name,$uname,$email,$cell);
            }


        }


    ?>



    <!-- table -->

    <div >
        <div class="card shadow w-50 mx-auto mt-3";>
            <?php
                if(isset($mess)){
                    echo $mess;
                }
            ?>
            <div class="card-header">
                <h2 style="text-align: center;"><b>Registration Form</b></h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input onmouseenter="typeWritername()" name='name' type="text" class="form-control" id="1">
                    </div>
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input onmouseenter="typeWriteruname()" name='uname' type="text" class="form-control" id="2">
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input onmouseenter="typeWriteremail()" name='email' type="email" class="form-control" id="3">
                    </div>
                    <div class="form-group">
                        <label for="">Cell</label>
                        <input onmouseenter="typeWritercell()" name='cell' type="number" class="form-control" id="4">
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
    <script>
        
       
            
            let n = 0;
            let un=0;
            let em=0;
            let c=0;
        function typeWritername() {
            
            let txt = 'e.g. Asif Hoosain Joarder'
            if(n < txt.length) {
            document.getElementById("1").placeholder += txt.charAt(n);
            n++;
            setTimeout(typeWritername, 70);
            }   
        }

         function typeWriteruname() {
            
            let txt = 'e.g. AsifHJ23'
            if(un < txt.length) {
            document.getElementById("2").placeholder += txt.charAt(un);
            un++;
            setTimeout(typeWriteruname, 70);
            }  
        }

         function typeWriteremail() {
            
            let txt = 'e.g. asifhossainjoarder23@gmail.com'
            if(em < txt.length) {
            document.getElementById("3").placeholder += txt.charAt(em);
            em++;
            setTimeout(typeWriteremail, 70);
            }
        }

        function typeWritercell() {
            
            let txt = 'e.g. 01792155323'
            if(c < txt.length) {
            document.getElementById("4").placeholder += txt.charAt(c);
            c++;
            setTimeout(typeWritercell, 70);
            }
        }







        
    </script>
</body>
</html>