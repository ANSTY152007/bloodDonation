<?php
include('crud_2.php');
ob_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <title>registration page</title>
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
          .blood{
            padding:20px;
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


    <h1>USER REGISTRATION !</h1>
    <form method="POST">
<div class="padding">

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"style="color:white">Coustomer Name:</label>
    <input type="text" class="form-control"name="name" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="name">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"style="color:white">Email:</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="email" class="form-control"name="email" id="inlineFormInputGroupUsername" placeholder="*email" required>
    </div>
  </div>

  <div class="row mb-3">
    <label class="form-label"style="color:white">Password</label>
    <div class="col">
    <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password" required>
    </div>
    <div class="col">
    <input type="password" class="form-control" name="cpassword" id="cpass" placeholder="Confirm Password" onblur="error()"required>
    <div id="error"></div>
    </div>
  </div>
  <div class="dropdown mb-3">
  <h3 style="color:white;">Blood Group</h3>
  <select class="form-select"id="chose" name="blood" required>
  <option value="">select</option>
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
</select>
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"style="color:white">Address</label>
    <input type="text" class="form-control"name="address" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="Address" required>
  </div>

  <button type="submit" class="btn btn-success" name="add">Submit</button>
  <button type="Reset" class="btn btn-danger">Reset</button>


  <?php
                    //$name = $_POST['name'];
                    //var name = document.getElementById('name').value;
                    if(isset($_POST['add']))
                    {
                      
                      $responce = adduser($_POST);

                      if($responce == 1)
                      {
                        // echo "<p style='color:white'>Data inserted successfully</p>";
                        //header('location:userlog.php');
                        echo '
                        <script>
                        let timerInterval;
                        Swal.fire({
                          title: "Login success",
                          html: "automatically redirected to login page",
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
                           window.location.href="userlog.php";
                          }
                        });                            
                        </script>
                        ';
                      }
                      else
                      {
                        echo "<p style='color:red'>Data  not inserted </p>";
                      }
                      }
                    
                  ?>
                 <h6 style="color:white">Already have an account?<a href="userlog.php">Sign in</a></h6>   
</div>
</form>

<script>

      function error(){
    var pass=document.getElementById('pass').value;
    var cpass=document.getElementById('cpass').value;
    if(pass!=cpass){
      document.getElementById('error').innerHTML=" Sorry you entered same password..!!!";
      document.getElementById('cpass').value="";
    }
    else{
      document.getElementById('error').innerHTML=" Password confirmed..!!";
    }
  }
    </script>

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


        