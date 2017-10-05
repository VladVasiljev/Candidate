<?php
// including the database connection file
include_once("dbh.php");
include 'header.php';

if(isset($_POST['update']))
{	
	
	
	$cid = mysqli_real_escape_string($conn, $_POST['cid']);	

	$companyName = mysqli_real_escape_string($conn, $_POST['name']);	
	$userName = mysqli_real_escape_string($conn, $_POST['username']);		
	$industryType = mysqli_real_escape_string($conn, $_POST['industry']);	

	
		
	
	// checking empty fields
	if(empty($companyName) || empty($userName) || empty($industryType) ) {	
			
		if(empty($companyName)) {
			echo "<font color='red'>Location: </font><br/>";
			
		}
		
		if(empty($userName)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($industryType)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
        }	
        
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE company SET name='$companyName',username='$userName',industry='$industryType' WHERE cid=$cid");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: companyprofile.php");
	}
}
?>

<?php
//getting id from url
$cid = $_GET['cid'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM company WHERE cid=$cid");

while($res = mysqli_fetch_array($result))
{
	$companyName = $res['name'];
	$userName = $res['username'];
    $industryType = $res['industry'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="companyprofile.php">Back To Profile</a>
	<br/><br/>
	<div class="forms">
	<H1>Please Enter All Fields</H1>
	<form name="form1" method="post" action="editProfileCompany.php">
		<table border="0">
			
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="name" value="<?php echo $companyName;?>"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $userName;?>"></td>
			</tr>
			<tr> 
				<td>Industry</td>
				<td><input type="text" name="industry" value="<?php echo $industryType;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="cid" value=<?php echo $_GET['cid'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
			</div>
				
			
		</table>
	</form>
</body>
</html>
