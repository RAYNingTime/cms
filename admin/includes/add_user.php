<?php
	if (isset($_POST['create_user'])) {
		$user_firstname = escape($_POST['user_firstname']);
		$user_lastname = escape($_POST['user_lastname']);
		$user_role = escape($_POST['user_role']);

		// $user_image = $_FILES['image']['name'];
		// $user_image_temp = $_FILES['image']['tmp_name'];

		$username = escape($_POST['username']);
		$user_email = escape($_POST['user_email']);
		$user_password = escape($_POST['user_password']);

		$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

		// ---OLD ENCTRYPTION ---
		// $query = "SELECT user_randSalt FROM users";
		// $select_randSalt_query = mysqli_query($connect, $query);
		// if(!$select_randSalt_query){
		// 	die("QUERY FAILED ". mysqli_error($connect));
		// }

		// $row = mysqli_fetch_array($select_randSalt_query);
		// $salt = $row['user_randSalt'];
		// $user_password = crypt($user_password, $salt);


		// Going to be added later on
		// move_uploaded_file($user_image_temp, "../images/$user_image");

		$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password)";
		$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";

		$create_user_query = mysqli_query($connect, $query);

		if(!$create_user_query)
			die("QUERY FAILED   " . mysqli_error($connect));

			echo "User Created: ". " " . " <a href='users.php'> View Users </a>";
	}
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">First name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="title">Last name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
	<label for="title">User Role</label>
		<select name="user_role" id="">
			<option value="subscriber">Select Option</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>

		</select>
	</div>



	<!-- <div class="form-group">
		<label for="title">Post Image</label>
		<input type="file" name="image">
	</div> -->

	<div class="form-group">
		<label for="title">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	
	<div class="form-group">
		<label for="title">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="title">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
	</div>

</form>