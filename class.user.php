<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($userName,$userEmail,$userPassword,$firstName,$lastName,$userExperience,$userIndustryType,$userBiography,$userPicture,$userCV)
	{
		try
		{
			$new_password = password_hash($userPassword, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO newuser(uid,email,pwd,first,last,years,industry,bio,userPic) 
		                                               VALUES(:userName, :userEmail, :userNewPassword, :firstName, :lastName, :userExperience, :userIndustryType, :userBiography, :userPicture,:userCV)");
			
			

			
			$stmt->bindparam(":userName", $userName);
			$stmt->bindparam(":userEmail", $userEmail);
			$stmt->bindparam(":userNewPassword", $new_password);
			$stmt->bindparam(":firstName", $firstName);
			$stmt->bindparam(":lastName", $lastName);										  
			$stmt->bindparam(":userExperience", $userExperience);									  
			$stmt->bindparam(":userIndustryType", $userIndustryType);									  
			$stmt->bindparam(":userBiography", $userBiography);									  
			$stmt->bindparam(":userPicture", $userPicture);									  
			$stmt->bindparam(":userCV", $userCV);									  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($userName,$userEmail,$userPassword)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, uid, email, pwd FROM newuser WHERE uid=:uname OR email=:umail ");
			$stmt->execute(array(':uname'=>$userName, ':umail'=>$userEmail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($userPassword, $userRow['pwd']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>