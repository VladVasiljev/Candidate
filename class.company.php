
<?php

require_once('configs/dbconfig.php');

class COMPANY
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
	
	public function register($companyName,$userName,$companyPassword,$position,$industry,$userPicture)
	{
		try
		{
			$new_password = password_hash($companyPassword, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO company(cid,name,username,industry,pwd,userPic,position) 
		                                               VALUES(:companyId, :companyName, :userName, :industryType, :companyNewPassword, :userPicture, :position)");
			
			

			$stmt->bindparam(":companyId", $companyId);
			$stmt->bindparam(":userName", $userName);
			$stmt->bindparam(":companyNewPassword", $new_password);
            $stmt->bindparam(":companyName", $companyName);
            $stmt->bindparam(":industryType", $industry);
            $stmt->bindparam(":userPicture", $userPicture);	
            $stmt->bindparam(":position", $position);								  
									  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($userName,$companyPassword)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT cid, username, pwd FROM company WHERE username=:uname ");
			$stmt->execute(array(':uname'=>$userName));
			$companyRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($companyPassword, $companyRow['pwd']))
				{
					$_SESSION['company_session'] = $companyRow['cid'];
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
		if(isset($_SESSION['company_session']))
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
		unset($_SESSION['company_session']);
		return true;
	}
}
?>