<?php
// including the database connection file
include_once("dbh.php");
include 'header.php';

if(isset($_POST['update']))
{	
	
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);	

	$firstName = mysqli_real_escape_string($conn, $_POST['first']);	
	$lastName = mysqli_real_escape_string($conn, $_POST['last']);	
	$userName = mysqli_real_escape_string($conn, $_POST['uid']);	
	$email = mysqli_real_escape_string($conn, $_POST['email']);	
	$yearsXP = mysqli_real_escape_string($conn, $_POST['years']);	
	$industryType = mysqli_real_escape_string($conn, $_POST['industry']);	
	$bio = mysqli_real_escape_string($conn, $_POST['bio']);	
		
	
	// checking empty fields
	if(empty($firstName) || empty($lastName) || empty($email) || empty($yearsXP) || empty($industryType) || empty($bio) ) {	
			
		if(empty($firstName)) {
			echo "<font color='red'>Location: </font><br/>";
			
		}
		
		if(empty($lastName)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
        }	
        
        if(empty($yearsXP)) {
			echo "<font color='red'>Years of Experience field is empty.</font><br/>";
        }
        if(empty($industryType)) {
			echo "<font color='red'>Industry Type field is empty.</font><br/>";
        }
        if(empty($bio)) {
			echo "<font color='red'>Bio field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE newuser  SET first='$firstName',last='$lastName',email='$email', years='$yearsXP',industry='$industryType',bio='$bio' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: userprofile.php");
	}
}
?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM newuser WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$firstName = $res['first'];
	$lastName = $res['last'];
    $email = $res['email'];
    $yearsXP = $res['years'];
    $industryType = $res['industry'];
	$bio = $res['bio'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="userprofile.php">Home</a>
	<br/><br/>
	<<H1>Please Enter All Fields</H1>
	<form name="form1" method="post" action="editProfile.php">
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="first" value="<?php echo $firstName;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="last" value="<?php echo $lastName;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
            <tr> 
				<td>Years Experience</td>
				<td><input type="text" name="years" value="<?php echo $yearsXP;?>"></td>
			</tr>
            <tr> 
				<td>Industry Type</td>
				<td><input type="text" name="industry" value="<?php echo $industryType;?>"></td>
			</tr>
            <tr> 
				<td>Bio</td>
				<td><input type="text" name="bio" value="<?php echo $bio;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
