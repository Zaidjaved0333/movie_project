<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>


<body class="body">

	<div class="sign section--bg" data-bg="assets/img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="login.php" class="sign__form" method = "post">
							<a href="index.html" class="sign__logo">
								<img src="img/logo.svg" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email" id="email" name="email" required>
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" id="Pass" name="Pass" required>
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember Me</label>
							</div>
							
							<button class="sign__btn" type="submit" name="btn">Sign in</button>

							<span class="sign__text">Don't have an account? <a href="register.php">Sign up!</a></span>

							<span class="sign__text"><a href="#">Forgot password?</a></span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php if (isset($_POST['btn'])) {
    $Email = $_POST['email'];
    $Password = $_POST['Pass'];
    $emailSearch = "select * from user where user_email = '$Email'";
    $query = mysqli_query($con, $emailSearch);
    $EmailCount = mysqli_num_rows($query);
    // echo $EmailCount;
    if ($EmailCount) {
        $res = mysqli_fetch_assoc($query);
        $_SESSION['db_Name'] = $res['user_name']; // echo $_SESSION['db_Name'];

        $_SESSION['db_Role'] = $res['Role'];
        $db_Pass = $res['user_pass'];
        $pass_decode = password_verify($Password, $db_Pass);

        
        if ($pass_decode) {
            if($_SESSION['db_Role'] == "A"){
                echo "<script>window.location.href = '../AdminLayout/index.php'</script>";
            }
            else{
                echo "<script>alert('Login Successful');window.location.href = 'index.php'</script>";
            }
            // header('location:index.php');
        } else {
            echo "<script>alert('Password Incorrect');window.location.href = 'login.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid Email');</script>";
    }
} ?>