<?php 
require 'lib/function.php';

$courses = get_courses();
$colleges = get_colleges();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $message = '';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    if($name == ''){
      $message = 'Kindly Provide the name.';
    }
    if ($email  =='' ) {
      $message = 'Kindly provide the Email.';
    }

    if($dob == ''){
      $message = 'Kindly Provide the Date of Birth';
    }

    for ($count=0; $count < count($_POST['colleges']) ; $count++) { 

    if (($_POST['courses'][$count] == '') || ($_POST['courses'][$count] == '')) {
        $message = 'Kindly provide Select the Course name and College Name';    
    } 
  }

  if($message == ''){

    $student = array('name' => $name,
    'email'=>$email,
    'dob'=>$dob );

    $student_id = save_student($student);

    for ($count=0; $count < count($_POST['colleges']) ; $count++) { 
    
      $data = array('studentId' => $student_id,
        'courseId' => $_POST['courses'][$count],
        'collegeId' => $_POST['colleges'][$count]
      );
      save_course_college($data);
  }
  header('location:student-data.php?id='.$student_id);
  die();
  }
  else{
     echo '<script type="text/javascript">alert('.$message.') </scrip>';
  }
}

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
      <a class="navbar-brand" href="#">Student Details*</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
           <form class="form-inline" action="login.php" method="POST">
                <div class="form-group mb-2">
                  <label for="email" class="sr-only">Email*</label>
                  <input type="text" class="form-control" id="email" name="email" value="email@example.com">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="password" class="sr-only">Password*</label>
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
          <h5 class="card-header">Student</h5>
          <div class="card-body">
        <form action="index.php" method="POST">
          <div class="form-group">
            <label for="student-name">Name*</label>
            <input type="text" class="form-control" id="student-name" name="name" placeholder="Enter Your Name" required>
          </div>
          <div class="form-group">
            <label for="student-email">Email*</label>
            <input type="email" class="form-control" id="student-email" name="email" placeholder="Enter Your Email" required>
          </div>
          <div class="form-group">
            <label for="student-dob">Date Of Birth*</label>
            <input type="date" class="form-control" id="student-dob" name="dob" placeholder="Enter Your Date of Birth" required>
          </div>

          <div class="form-group" id="add_row">
            <span id="error"></span>
            <div class="row">
              <div class="col-md-5">
               <label for="student-course">Course*</label>
              <select class="form-control" id="student-course" name="courses[]">
               <?php foreach ($courses as $course) {?>
                  <option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>
                <?php } ?>
              </select>
              </div>
              <div class="col-md-5">
                <label for="student-college">College*</label>
                <select class="form-control" id="student-college" name="colleges[]">
                  <?php foreach ($colleges as $college) {?>
                  <option value="<?php echo $college['id']; ?>"><?php echo $college['college_name']; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-md-2">
                <label for="student-college">Action</label>
                <button type="button" class="btn btn-success" id="add">+ Add</button>
              </div>
            </div>


            
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
      <p class="m-0 text-center text-white">Created by Rajul Vishwakarma</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
 
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          var count = 0;

          $(document).on('click','#add',function(){
            count++;
            var output = '';
            output = '     <div class="row my-4"><div class="col-md-5"><select class="form-control" name="courses[]" id="student-course'+count+'"><?php foreach ($courses as $course) {?><option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>';
            output += '<?php } ?></select></div><div class="col-md-5"><select class="form-control" name="colleges[]" id="student-college'+count+'"><?php foreach ($colleges as $college) {?>
                  <option value="<?php echo $college['id']; ?>"><?php echo $college['college_name']; ?></option><?php } ?></select></div>';
              output += '<div class="col-md-2"><button type="button" class="btn btn-danger remove">X</button></div></div>';
            $('#add_row').append(output);
          });


          $(document).on('click','.remove',function(){
              $(this).closest('.row').remove();
          });

      })
  </script>

</body>

</html>
