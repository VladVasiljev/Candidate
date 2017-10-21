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
	$positionType = mysqli_real_escape_string($conn, $_POST['position']);	

	
		
	
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
		
		if(empty($positionType)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE company SET name='$companyName',username='$userName',industry='$industryType', position='$positionType' WHERE cid=$cid");
		
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
	$positionType = $res['position'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
<form action="companyprofile.php">
    <button type="submit" value="Go to Profile" />Go to Profile</button>
</form>
	
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
				<td>Position</td>
				<td><input type="text" name="position" value="<?php echo $positionType;?>"></td>
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
