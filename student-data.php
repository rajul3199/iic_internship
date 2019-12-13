<?php 

require 'lib/function.php';

$student_id = $_GET['id'];

$student = get_student($student_id);
$selected_courses_colleges = get_selected_courses_colleges($student_id);


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student Details</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Student Details</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
           <form class="form-inline" action="login.php" method="POST">
                <div class="form-group mb-2">
                  <label for="email" class="sr-only">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="email@example.com">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Login</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

              <div class="card my-4">
          <h5 class="card-header">Student Data</h5>
          <div class="card-body">
          
                          <div class="row">
                          <div class="col-12">
                          <div class="row">
                          <div class="col-md-8 col-sm-8">
                          <h2 class="card-title">Name: <?php echo $student['name']; ?></h2>
                          <p class="card-text"><strong>Email: </strong> <?php echo $student['email']; ?> </p>
                          <p class="card-text"><strong>Date of Birth: </strong>  <?php echo $student['dob']; ?></p>
                          </div>           
                          </div>
                          </div>
                          </div> 
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">College Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $number=0;
                   foreach ($selected_courses_colleges as $selected_course_college) {
                      $number++;
                      $course_name = get_courses($selected_course_college['course_id']);
                      $college_name = get_colleges($selected_course_college['college_id']);
                      ?>
                  <tr>
                    <td scope="row"><?php echo $number; ?></td>
                    <td><?php echo $course_name['course_name'] ?></td>
                    <td><?php echo $college_name['college_name'] ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
          </div>
        </div>  

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->




  </div>
<footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright © Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
