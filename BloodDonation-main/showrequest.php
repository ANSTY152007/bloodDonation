<?php
include('crud_3.php');
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
    <title>show page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        h1{
           color: #fff;
           text-align: center;
           height: 5rem;
           line-height: 5rem;
       }
       body{
            background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)),url(back.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
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
  #ser{
    color:white;
    margin-left:20%;
    display:inline-block;
  }
  #chose{
    width:20%;
    display:inline-block;
    margin-left:20px;
  }
  #sc{
      height:35px;
    }
 
  #edon{
    display:inline-block;margin-top:40px;margin-left:-15px;
  }
  #u{
    margin-left:20px;
    display:inline-block;
  }
  @media screen and (max-width: 800px){
    #edon{
  margin-left:-180px;
    }
    #ser{
    margin-left:10px;
    padding:0;
  
  }
  #chose{
    margin-top:0;
    width:20%;
  }
  #sc{
      height:35px;
    }
    #u{
    margin-left:20px;
    
  }

  }
    </style>
  </head>
  <body>
 
 <!-- Navbar Start -->
 
 <?php
  include('header.php');
?>
 <br>
    <!-- Navbar End -->

    <form action="" method="post">
      <div class="dropdown">
        <p id="ser">Select Blood Group</p>
        <select class="form-select row" id="chose" name="blood_group">
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
      <input class="btn btn-outline-success" type="submit"  id="u"value="Search" name="search">
        
      </div>
    </form>
<!-- <table></table> -->
<br>

<table class="table table-dark table-striped">
  
  <tr>
    <th scope="col">SL NO.</th>
    <th scope="col">NAME</th>
    <th scope="col">EMAIL</th>
    <th scope="col">BLOOD GROUP</th>
    <th scope="col">Address</th>
    <th scope="col">ACTION</th>
 
  </tr>
    <?php
       if(isset($_POST['search']))
       {
        
        $blood_group = $_POST['blood_group'];
        
        $_SESSION['bloodgroup'] = $_POST['blood_group'];
        // echo "Group: ".$blood_group;

        $responce = getAllDonorsByGroup($blood_group);
        //echo "Records ".mysqli_num_rows($responce);
        $i=1;
          if(mysqli_num_rows($responce)>0)
          {
              while($data = mysqli_fetch_assoc($responce))
              {
                  //  <h1>Available Blood Group..</h1>      
                  echo '               
                  <tr>
                  <td scope="row">'.$i.'</td>   
                  <td>'.$data['name'].'</td>            
                  <td>'.$data['email'].'</td>   
                  <td>'.$data['blood'].'</td>   
                  <td>'.$data['address'].'</td> 
                  <td>  
                  <a href="request.php?requestTo='.$data['email'].'" class="btn btn-success">REQUEST</a>
                  </td>
                  </tr>';
                  $i++;
              }
          }
          else
          {
              echo "<h1 style='color:white; text-align:center'> sorry no record found...</h1>";
          }
       }
    ?>

</table>

<!-- <table></table> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>

   
    
    <?php
  include('footer.php');
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


        