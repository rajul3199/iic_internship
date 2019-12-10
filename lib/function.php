<?php 
 function db_connect()
 {
 	$config = require 'config.php';

 	$pdo = new PDO($config['database_dns'],$config['database_user'],$config['database_pass']);

 	return $pdo;
 }


 function save_student($studentToSave){
 	$pdo = db_connect();
 	
 	$sql = "insert into student set name = :nameVal, email= :emailVal, dob= :dobVal";

 	$stmt = $pdo->prepare($sql);
 	$stmt->bindParam(':nameVal', $studentToSave['name']);
	$stmt->bindParam(':emailVal', $studentToSave['email']);
	$stmt->bindParam(':dobVal', $studentToSave['dob']);
	$stmt->execute();

	$last_id = $pdo->lastInsertId();

	return $last_id;
 }

 function save_course_colleges($data){
 	$pdo = db_connect();
 	$sql = "insert into selected_courses set student_id = :studentVal, course_id = :courseVal, college_id= :collegeVal";

 	$stmt = $pdo->prepare($sql);
 	$stmt->bindParam(':studentVal', $data['studentId']);
	$stmt->bindParam(':courseVal', $data['courseId']);
	$stmt->bindParam(':collegeVal', $data['collegeId']);
	$stmt->execute();
 }


 function get_courses(){
 	$pdo = db_connect();
	$sql = 'select * from courses';

   	$stmt = $pdo->prepare($sql);
   	$stmt->execute();

    $courses = $stmt->fetchAll();
    return $courses;
 }

 function get_colleges(){
 	$pdo = db_connect();
 	$sql = 'select * from colleges';

   	$stmt = $pdo->prepare($sql);
   	$stmt->execute();

    $colleges = $stmt->fetchAll();
    return $colleges;
 }

 ?>