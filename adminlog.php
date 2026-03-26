<?php
  include('crud_4.php');
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>loginUser</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>login page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)),url(back.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
           
            color: #fff;
            text-align: center;
            height: 5rem;
            line-height: 5rem;
        }
        .padding{
            padding: 50px;
            padding-top: 0;
          }
          #logo{
    height:60px;
    width:60px;
    border-radius:50%;
    border:1px solid red;
  }
  #sc{
              height:35px;
          }
  #edon{
    display:inline-block;margin-top:40px;margin-left:-15px;
  }
  @media screen and (max-width: 800px){
    #edon{
  margin-left:-180px;
    }
  }
    </style>
</head>
<body>  
  
 
    <!-- Navbar Start -->
    <?php
  include('header.php');
?>
    <!-- Navbar End -->

<h1>ADMIN LOGIN !</h1>
<h4 style="color:white"> <br>
 <span class="mx-4"></span></h4>
    <form method="POST">
<div class="padding">
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"style="color:white">Email:</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="email" class="form-control"name="adminemail" id="email" placeholder="User email" required>
    </div>
  </div>

  <div class="row mb-3">
    <label class="form-label"style="color:white">Password</label>
    <div class="col">
    <input type="password" class="form-control" name="adminpassword" id="password" placeholder="Enter Password" required><br>
 
    <button type="submit" class="btn btn-primary" name="login">Login</button>

    
      
                    <?php
                        
                        if(isset($_POST['login']))
                        {
                            $responce = loginadmin($_POST);

                            $record = mysqli_num_rows($responce);

                           if($record > 0)
                           {

                            //set Session
                            //session_start();    
                            $_SESSION['adminemail'] = $_POST['adminemail'];                     

                            echo '
                            <script>
                            let timerInterval;
                            Swal.fire({
                              title: "Login success",
                              html: "atomaticaally redirected to Admin panel",
                              timer: 2000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                  timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                              },
                              willClose: () => {
                                clearInterval(timerInterval);
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                               window.location.href="adminpanelindex.php";
                              }
                            });                            
                            </script>
                            ';
                            //header('location:AdminDashboard.php');
                                
                           }
                           else
                           {
                            echo "<p style='color:red'>Sorry invalid email or password</p>";
                           }
                        } 
                    ?>
    </div>
</div>
</div>
                    
                               
</form>
                 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>

<?php
  include('footer.php');
?>


    <?php      
      ob_end_flush();
    ?>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>