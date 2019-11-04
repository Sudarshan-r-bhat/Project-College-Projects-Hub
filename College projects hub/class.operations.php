<?php
include_once('class.db_connection.php');
class operations
{
	public $conn;
	//in php constructor is trated as a normal function. which is capable of returning a value.
	function __construct()
	{
		$db_connect = new db_connection();
		$this->conn = $db_connect->connect();
		return $this->conn;
	}

	function validate($username, $password)//for logging-in.
	{
		$ask = "select password from personaldetails where username='$username'";
		$res = $this->conn->query($ask)->fetchAll();//this is the resultset.fetch_assoc() is used by default.
		foreach($res as $r)
		{
			if( $r['password'] == $password)
				return true;
		}
		return false;
    }
    function registration($username, $password, $phone, $email_id, $address, $college)
    {
		$ask = "INSERT INTO personaldetails (username,password,phone,email_id,address,college) VALUES (?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($ask);
		$stmt->execute([$username, $password, $phone, $email_id, strtoupper($address), strtoupper($college)]);//this syntax could be wrong....
		$count = $stmt->rowCount();// method to get the row count for prepared execute.
		return $count;
    }
    function checkUsername($username)
    {
		$ask = "select *from personaldetails where username='$username'";
		$res = $this->conn->query($ask);
		//$res = $res->fetchAll();
		$count = $res->rowCount();// method to get the row count for query/execute.
		if($count <= 0)
			return true;
		else
			return false;
	}
	
	function addSkill($user, $skill)//this method is optimized for multiple entries in skills table.
	{
		//we are appending new skills to the already present skills.

		$ask0 = "select skills from skills where username='$user'";
		$res0 = $this->conn->query($ask0)->fetchAll();
		$ret0;
		forEach($res0 as $r0)
		{
			$ret0 = $r0['skills'];
		}
		if($this->conn->query($ask0)->rowCount() == 0)
		{
			$updated = strtoupper($skill);
			$ask = "INSERT INTO skills(username, skills) VALUES('$user', '$updated')";
			$this->conn->exec($ask);// exec should be used when u are not expecting result set, query() when you want resultset.
			return TRUE;
		}
		else
		{
			$updated = strtoupper($skill.' '.$ret0);
			
			$ask = "UPDATE skills SET skills='$updated' where username='$user'";
			$this->conn->exec($ask);// exec should be used when u are not expecting result set, query() when you want resultset.
			return TRUE;
		}	
	}

	function addNewProject($username, $title, $description, $pid)//this method is not optimized for multiple entries in projects table.
	{
		//we need to append to the projects column. not put a new value. 

		$ask = "INSERT INTO projects(`username`, `title`, `description`, `link`, `project_id`, `college`) VALUES(?, ?, ?, ?, ?, ?)";
		$ask2 = "select college from personaldetails where username='$username'";
		$result = $this->conn->query($ask2)->fetchAll();
		$college;
		foreach($result as $r)
		{
			$college = ''.$r['college'];
		}
		$stmt = $this->conn->prepare($ask);
		$inserted = $stmt->execute(array($username, strtoupper($title), strtoupper($description),'', $pid, strtoupper($college)));
		if($inserted)
		return TRUE;
		else
		return FALSE;
	}

	function listSkills($username)//this method is optimized for multiple entries in skills table.
	{
		$ask = "select skills from skills where username='$username'";
		$res = $this->conn->query($ask)->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			$ret = explode(" ", $r['skills']); //this is an indexed array.
		}
		if($this->conn->query($ask)->rowCount() == 0)
		{
			array_push($ret, 'please add skills.');
		}
		return $ret;// we are returning an array.
	}

	function projectsUndertaken($username)//this method is not optimized for multiple entries in projects table.
	{
		$ask = "select title from projects where username='$username'";
		$res = $this->conn->query($ask)->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			array_push($ret, $r['title']);
		}
		if($this->conn->query($ask)->rowCount() == 0)
		{
			$put0 = 'no projects added yet.';
			array_push($ret, $put0);
		}
		return $ret;// we are returning an array.
	}

	function allDetails($username)//this method is optimized for multiple entries in projects table.
	{
		$ask = "select phone, email_id, address, college from personaldetails where username='$username'";
		$result = $this->conn->query($ask);
		$res = $result->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			array_push($ret, $r['phone']);
			array_push($ret, $r['email_id']);
			array_push($ret, $r['address']);
			array_push($ret, $r['college']);
		}
		if($result->rowCount() == 0)
		{
			$put0 = 'oh oo details are missing...you will have to re-register:(';
			array_push($ret, $put0);
		}
		return $ret;// we are returning an array.
	}

	function topScorers()//this is wrong when projects table has multiple entries in each column.
	{
		$ask = "SELECT username FROM projects GROUP BY username ORDER BY COUNT(*) DESC";
		//this query will get usernames based on no of times user is involved in differnt projects.
		$res = $this->conn->query($ask)->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			array_push($ret, $r['username']);
		}
		if($this->conn->query($ask)->rowCount() == 0)
		{
			$put0 = 'start a project or join one!';
			array_push($ret, $put0);
		}
		return $ret;
	}

	function regCollg()//optimization not required.
	{
		$ask = "SELECT DISTINCT college FROM personaldetails";
		$res = $this->conn->query($ask)->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			array_push($ret, $r['college']);
		}

		if($this->conn->query($ask)->rowCount() == 0)
		{
			$put0 = 'oh oo details are missing...you will have to re-register:(';
			array_push($ret, $put0);
		}
		return $ret;
	}

	function searchResults($title, $college, $skills)// not optimized for multiple entries of projects table.
	{
		//convert all user inputs to uppercase and then process.
		$coll = strtoupper($college);
		$t = strtoupper($title);
		$sk = strtoupper($skills);
		$ret = array();

		$ask = "SELECT DISTINCT title FROM projects WHERE title LIKE '%$t%' OR college LIKE '%$coll%'";
		$res = $this->conn->query($ask)->fetchAll();
		foreach($res as $r)
		{
			array_push($ret, $r['title']);
		}
		foreach($sk as $s)
		{
			$ask2 = "SELECT DISTINCT title FROM projects WHERE description LIKE '%$s%'";
			$res2 = $this->conn->query($ask)->fetchAll();
			foreach($res2 as $r)
			{
				array_push($ret, strtoupper($r['title']));
			}
		}
		return array_unique($ret);
	}

	function groupMembers($title)
	{
		//we select the users having one of the titles as '$title'.
		$ask = "SELECT username FROM projects WHERE title LIKE '%$title%'";
		$res = $this->conn->query($ask)->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			array_push($ret, $r['title']);
		}
		if($this->conn->query($ask)->rowCount() == 0)
		{
			array_push($ret, "oh o. members aren't added properly.");
		}
		return $ret;

	}

	function projDescription($title)//this method is optimized for multiple entries in projects table.
	{
		$ask0 = "SELECT title FROM projects WHERE title LIKE '%$title%'";
		$res0 = $this->conn->query($ask0)->fetchAll();
		$ret0 = array();
		foreach($res0 as $r0)
		{
			array_push($ret0, $r0['title']);
		}
		if($this->conn->query($ask0)->rowCount() == 0)
		{
			array_push($ret0, "oh o. members aren't added properly.");
		}

		$titleIndex = 0; //this will find us the index of the current title, 
		//thus we find the appropriate description for the title.
		
		for($i = 0; $i < count($ret0); $i++)
		{
			if($ret[$i] == $title)
			{
				$titleIndex = $i;
				break;
			}
		}

		$ask = "SELECT description FROM projects WHERE title LIKE '%$title%'";
		$res = $this->conn->query($ask)->fetchAll();
		$ret = array();
		foreach($res as $r)
		{
			array_push($ret, $r['title']);
		}
		if($this->conn->query($ask)->rowCount() == 0)
		{
			array_push($ret, "oh o. members aren't added properly.");
		}
		$correctDescription = explode('--', $ret[0]);
		return $correctDescription[$titleIndex];
	}

	function notifications($username)
	{
		$ask = "SELECT fromUser, skills FROM notifications WHERE toUser LIKE '%$username%'";
		$res = $this->conn->query($ask)->fetchAll();
		$ret;
		if($this->conn->query($ask)->rowCount() == 0)
		{
			$ret = 'NO notifications Yet.';
			echo $ret;
		}
		else
		{
			foreach($res as $r)
			{
				
$html = '<div> <form action="notification_driver.php" method="post"> '.$r['fromUser'].'<br>'.'<div id="fromUserDetails">skills:'.
$r['skills'].'<br>projects undertaken: '.$r['title'].'<br></div>'.'<input type="submit" name="accept" value="accept">'.
'<input type="submit" name="reject" value="reject"><br>'.
'<input type="hidden" name="fromUser" value="'.$r['fromUser'].'">'.'</form></div>';
				echo $html;

			}
		}	
	}

	 
	function accepted($user)
	 {
		
		return True;
	 }

	 function rejected($user)
	 {


		return True;
	 }
}
// i need to make sure all multiple entries are sepereated by '--'
?>