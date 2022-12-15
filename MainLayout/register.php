<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>


<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="register.php" class="sign__form" method = "post">
							<a href="index.php" class="sign__logo">
								<img src="img/logo.svg" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Name" name = "name">
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email" name = "email">
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" name = "Pass">
							</div>

                            <div class="sign__group">
								<input type="password" class="sign__input" placeholder=" Confirm Password" name = "ConfPass">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
							</div>
							
							<button type = "submit" class="sign__btn" type="button" name = "btn">Sign up</button>

							<span class="sign__text">Already have an account? <a href="login.php">Sign in!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php if (isset($_POST['btn'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['Pass'];
    $ConfPass = $_POST['ConfPass'];
    $Pass = password_hash($Password, PASSWORD_BCRYPT);
    $CPass = password_hash($ConfPass, PASSWORD_BCRYPT);


    print_r($_POST);
    $Emailquery = "select * from user where user_email = '$Email'"; //xyz@gmail.com
    $rs = mysqli_query($con, $Emailquery);

    if (mysqli_num_rows($rs) > 0) { //1 > 0 
        echo "<script>alert('Email Already Exist')</script>";
    } else {
        if ($Password === $ConfPass) {
            $Insquery = "insert into user (user_name,user_email,user_pass,user_cpass,Role) values ('$Name','$Email','$Pass','$CPass','V')";
            $res = mysqli_query($con, $Insquery);
            if ($res) {
                echo "<script>alert('Data Inserted')</script>";
            } else {
                echo "<script>alert('Data not Inserted')</script>";
            }
        } else {
            echo "<script>alert('Password not matching')</script>";
        }
    }
} ?>
