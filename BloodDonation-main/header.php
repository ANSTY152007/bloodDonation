<?php ob_start();?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="imgs/logo.jpg" alt="" id="logo">
    </a>
    <h2 id="edon">eDonate</h2>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donorlog.php">Donor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userlog.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlog.php">Admin</a>
        </li>
       

        </ul>
      <form class="d-flex">
        <a href="showrequest.php"class="btn btn-outline-success m-2" type="submit"id="sc">Search</button></a>
        <?php
            session_start();

            if(isset($_SESSION['email']))
            {
                echo '
                    <a href="logout.php"class="btn btn-outline-danger m-2" type="submit"id="sc">Logout</button></a>
                ';
            }
            ob_end_flush();
        ?>
      </form>
    </div>
  </div>
</nav>