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

 function save_course_college($data){
 	$pdo = db_connect();
 	$sql = "insert into selected_courses set student_id = :studentVal, course_id = :courseVal, college_id= :collegeVal";

 	$stmt = $pdo->prepare($sql);
 	$stmt->bindParam(':studentVal', $data['studentId']);
	$stmt->bindParam(':courseVal', $data['courseId']);
	$stmt->bindParam(':collegeVal', $data['collegeId']);
	$stmt->execute();
 }


 function get_courses($id=0){
 	$pdo = db_connect();
	$sql = 'select * from courses';

   	if($id != 0){
 		$sql = $sql.' where id= :idVal';
 		$stmt = $pdo->prepare($sql);
 		$stmt->bindParam(':idVal',$id);
 		$stmt->execute();
 		$course = $stmt->fetch();
 		return $course;
 	}
 	else{
 		$stmt = $pdo->prepare($sql); 
 		$stmt->execute();
 		$courses = $stmt->fetchAll();
 		return $courses;
 	}
 }

 function get_colleges($id=0){
 	$pdo = db_connect();
 	$sql = 'select * from colleges';

   	if($id != 0){
 		$sql = $sql.' where id= :idVal';
 		$stmt = $pdo->prepare($sql);
 		$stmt->bindParam(':idVal',$id);
 		$stmt->execute();
 		$college = $stmt->fetch();
 		return $college;
 	}
 	else{
 		$stmt = $pdo->prepare($sql); 
 		$stmt->execute();
 		$colleges = $stmt->fetchAll();
 		return $colleges;
 	}
 }

 function get_student($id = 0){
 	$pdo = db_connect();
 	$sql = 'select * from student';
 	if($id != 0){
 		$sql = $sql.' where id= :idVal';
 		$stmt = $pdo->prepare($sql);
 		$stmt->bindParam(':idVal',$id);
 		$stmt->execute();
 		$student = $stmt->fetch();
 		return $student;
 	}
 	else{
 		$stmt = $pdo->prepare($sql); 
 		$stmt->execute();
 		$students = $stmt->fetchAll();
 		return $students;
 	}
 }

function get_selected_courses_colleges($id){
	$pdo = db_connect();
	$sql = 'select course_id,college_id from selected_courses where student_id = :studentVal';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':studentVal',$id);
	$stmt->execute();
	$selected_courses = $stmt->fetchAll();
	return $selected_courses;
}

 ?>