<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	public function displayAllSpecific($table,$value,$item)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}


		public function displayAllSpecificWithOrder($table,$value,$item,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayAllSpecificWithOrder2($table,$value,$item,$value2,$item2,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' AND $value2='$item2' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}


	public function displayAllSpecificWithOrder3($table,$value,$item,$value2,$item2,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' OR $value2='$item2' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}


	public function displayAllSpecificWithOrder4($table,$value,$item,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value!='$item' and reply='' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}


	
	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	//Display Specific
	public function displayName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}



	//Display Specific
	public function displayByMatno($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM student where matric_no='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}




	public function displayCourseName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM course where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}


	
		public function displayDepartmentByLecturerId($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['department_id'];
		}else{
			return "No found records";
		}
	}


	public function displayNameById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}






	public function displayOneById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


		

	public function displayOneByEmail($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}

	public function displayOneByMatno($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where matric_no='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


	public function state_one($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,name FROM state where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}




//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}


		public function countAssociation($id)
	{
		$q=$this->con->query("SELECT association_id FROM student where  association_id='$id' ");
		if ($q) {
			return $q->num_rows;
		} else { 
			return 0;
		}
		
		
	}



	public function countAllWithTwo($table,$cat)
	{
		$q=$this->con->query("SELECT id FROM {$table} where role='$cat' ");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}


		public function countAllAgent($cat)
	{
		$q=$this->con->query("SELECT id FROM agent where party='$cat' ");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}

//Counting Specific
	
// Inserting


	// Insert into State,Lga,Town
	public function insertState($value)
	{
		$name = $this->cleanse(strtoupper($value));
		$query="INSERT INTO state(name) VALUES('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-state.php?msg=State was successfully inserted&type=success");
		}else{
			header("Location:view-state.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertLecturer($value)
	{

		$name = $this->cleanse($post['name']);
		$email = $this->cleanse($post['email']);
		$password = $this->cleanse($post['password']);
		$phone = $this->cleanse($post['phone']);
		$address = $this->cleanse($post['address']);
		$gender = $this->cleanse($post['gender']);
		$state_id = $this->cleanse($post['state_id']);
		$department_id= $this->cleanse($post['department_id']);

		

		$query="INSERT INTO lecturer(name,email,password,phone,address,gender,state_id,department_id) VALUES('$name','$email','$password','$phone','$address','$gender','$state_id','$department_id')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','2')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-lecturer.php?msg=Lecturer was successfully inserted&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-lecturer.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertStudent($value)
	{

		$name = $this->cleanse($post['name']);
		$email = $this->cleanse($post['email']);
		$password = $this->cleanse($post['password']);
		$phone = $this->cleanse($post['phone']);
		$address = $this->cleanse($post['address']);
		$gender = $this->cleanse($post['gender']);
		$state_id = $this->cleanse($post['state_id']);
		$department_id= $this->cleanse($post['department_id']);
		$course_id = $this->cleanse($post['course_id']);
		$matric_no = $this->cleanse($post['matric_no']);

		$query="INSERT INTO student(name,email,password,phone,address,gender,state_id,department_id,course_id,matric_no) VALUES('$name','$email','$password','$phone','$address','$gender','$state_id','$department_id','$course_id','$matric_no')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','3')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-student.php?msg=Student was successfully inserted&type=success");
			$this->con->query($query2);
		}else{
			header("Location:view-student.php?msg=Error adding data try again!&type=error");
		}
	}


	public function insertDepartment($value)
	{
		$name = $this->cleanse(strtoupper($value));
		$query="INSERT INTO department(name) VALUES('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-department.php?msg=Department was successfully inserted&type=success");
		}else{
			header("Location:view-de.php?msg=Error adding data try again!&type=error");
		}
	}

	public function insertCourse($value)
	{
		$name = $this->cleanse(strtoupper($post['name']));
		$department_id = $this->cleanse($post['department_id']);
		$query="INSERT INTO course(name,department_id) VALUES('$name','$department_id')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-course.php?msg=Course was successfully inserted&type=success");
		}else{
			header("Location:view-course.php?msg=Error adding data try again!&type=error");
		}
	}

		public function insertCourseAllocation($value)
	{
		$course_id = $this->cleanse($post['course_id']);
		$lecturer_id = $this->cleanse($post['lecturer_id']);
		$query="INSERT INTO course_allocation(lecturer_id,course_id) VALUES('$lecturer_id','$course_id')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-course-allocation.php?msg=Course Allocation was successfully inserted&type=success");
		}else{
			header("Location:view-course-allocation.php?msg=Error adding data try again!&type=error");
		}
	}

		public function insertComplain($value)
	{
		$matric_no = $this->cleanse($post['matric_no']);
		$ticket = $this->cleanse($post['tid']);
		$complain = $this->cleanse($post['msg1']);
		$course_id = $this->cleanse($post['course_id']);
		$lecturer_id = $this->cleanse($post['lecturer_id']);
		$query="INSERT INTO complain(tid,matric_no,lecturer_id,course_id,msg1,msg2,status) VALUES('$ticket','$matric_no','$lecturer_id','$course_id','$complain','','1')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			// $this->sendSms('08168472495', $complain);
			header("Location:view-complain.php?msg=Complain was successfully inserted&type=success");
		}else{
			header("Location:view-complain.php?msg=Error adding data try again!&type=error");
		}
	}


		public function AdminComplainG($value)
	{
		$matno = $this->cleanse($post['matno']);
		$id = $this->cleanse($post['id']);
		$reply = $this->cleanse($post['reply']);
		$query="UPDATE complain_g SET reply='$reply' WHERE sender='$matno' AND id='$id'";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:reply.php?matno=$matno&id=$id&msg=Reply was successfully inserted&type=success");
		}else{
			header("Location:reply.php?matno=$matno&id=$id&msg=Error adding data try again!&type=error");
		}
	}


	public function StudentComplainG($value)
	{
		$matric_no = $this->cleanse($post['matric_no']);
		$complain = $this->cleanse($post['complain']);
		$query="INSERT INTO complain_g(sender,reciever,message,reply) VALUES('$matric_no','admin','$complain','')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:complain.php?msg=Complain was successfully inserted&type=success");
		}else{
			header("Location:complain.php?msg=Error adding data try again!&type=error");
		}
	}


		public function insertComplainAction($value)
	{
		$id = $this->cleanse($post['id']);
		$phone = $this->cleanse($post['phone']);
		$msg2 = $this->cleanse($post['msg2']);
		$query="UPDATE complain SET msg2='$msg2',status='3' WHERE id='$id'";
		$sql = $this->con->query($query);
		if ($sql==true) {
			// $this->sendSms($phone, $msg2);
			header("Location:view-pcomplain.php?msg=Complain Action was successfully done&type=success");
		}else{
			header("Location:view-pcomplain.php?msg=Error performing action try again!&type=error");
		}
	}


		public function forwardToLecturer($id,$status)
	{
		$query="UPDATE complain SET status='$status' WHERE id='$id'";
		$sql = $this->con->query($query);
		if ($sql==true) {
			// $this->sendSms($phone, $msg2);
			header("Location:view-complain.php?msg=Complain was successfully sent to lecturer&type=success");
		}else{
			header("Location:view-complain.php?msg=Error performing action try again!&type=error");
		}
	}





	
	public function updateAdmin($post)
	{
		
		$email=$this->cleanse($post['email']);
		$password=$this->cleanse($post['password']);
		$query="UPDATE login SET email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}

	public function updateUser($table,$post)
	{
		
		$email=$this->cleanse($post['email']);
		$password=$this->cleanse($post['password']);
		$query="UPDATE login SET email='$email',password='$password' WHERE email='$email' ";
		$query2="UPDATE $table SET email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			$this->con->query($query2);
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}





	public function displayProfile($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}

	public function displayStudentProfile($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM student where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}



//Empty Table
	public function emptyTable($table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "TRUNCATE {$table}";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}



//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}
	

	public function deleteTwoTable($email,$table,$table2,$url) 
	{ 
		$email = $this->cleanse($email);
		$query = "DELETE FROM {$table} WHERE email= '$email'";
		$query2 = "DELETE FROM {$table2} WHERE email= '$email'";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
			$this->con->query($query2);
		} else {
			header("Location:$url?msg=Error deleting Data&type=error");
		}
	}


	public function deleteThreeTable($email,$table,$table2,$table3,$url) 
	{ 
		$email = $this->cleanse($email);
		$query = "DELETE FROM {$table} WHERE email= '$email'";
		$query2 = "DELETE FROM {$table2} WHERE email= '$email'";
		$query3 = "DELETE FROM {$table3} WHERE email= '$email'";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
			$this->con->query($query2);
			$this->con->query($query3);
		} else {
			header("Location:$url?msg=Error deleting Data&type=error");
		}
	}


//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}



	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}




	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}



}

?>

