<?php  
require_once 'connection.php';
session_start();

$username = $_POST['user'];
$password = $_POST['pass'];

if (empty($username) & empty($password)) {
	return false;
}

// $sql = "SELECT * FROM account WHERE account.acc_user=$username and account.acc_pass=$password";
$sql = "SELECT * FROM account WHERE account.acc_user LIKE '%$username%' and account.acc_pass LIKE '%$password%' ";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['status'] == "Administrator") {
			$_SESSION['AccountID']=$row['acc_id'];
			echo "Administrator";
		}
		if ($row['status'] == "Member") {
			$_SESSION['AccountID']=$row['acc_id'];
			echo "Member";
		}
	}
}
echo false;
?>