
<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>
<?php if (!isset($_SESSION['db_Role'])) {
    echo "<script>alert('Plaese First You Login!!');window.location.href = 'index.php'</script>";
} elseif ($_SESSION['db_Role'] != 'V') {
    echo "<script>alert('Plaese First You Login!!');window.location.href = 'index.php'</script>";
} ?>

<?php
$BookId = $_GET['BokId'];
$query = "select * from movie_product Inner join movie_category on movie_category.movie_cat_id = movie_product.movie_category Inner join theater
    on movie_product.product_id = theater.movie_Product where id = '$BookId'"; //    $query = "select * from theater inner join movie_product inner on  join movie_category on movie_product.movie_category = //    movie_category.movie_cat_id where id = '$BookId'";
$res = mysqli_query($con, $query);
$datas = mysqli_fetch_assoc($res);
?>


<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container" style = "margin-top:80px;">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="booking_form.php" class="sign__form" method = "post">
						
								<h2 style = "color:pink; margin_bottom:52px;"> Ticket Booking </h2>
                                <br>
                                <br>
							

							<div class="sign__group">
                                <label for="" style = "color:white"> Theater Name:</label> <br>
								<input type="text" class="sign__input"  name = "theater_name" style = "width:560px" value = "<?= $datas[
            'name'
        ] ?>" readonly>
							</div>
                            <div class="sign__group">
                                <label for="" style = "color:white"> Movie Name:</label> <br>
								<input type="text" class="sign__input" name = "movie_name" style = "width:560px" value = "<?= $datas[
            'movie_name'
        ] ?>" readonly>
							</div>

                            <div class="sign__group">
                            <label for="" style = "color:white"> First Name:</label> <br>
								<input type="text" class="sign__input" placeholder="Enter your first name " name = "First_Name" style = "width:560px">
							</div>

                            <div class="sign__group">
                            <label for="" style = "color:white"> Last Name:</label> <br>
								<input type="text" class="sign__input" placeholder="Enter Youor Last Name " name = "Last_Name" style = "width:560px">
							</div>
                            
                            <div class="sign__group">
                            <label for="" style = "color:white"> Total Number of Seats</label> <br>
								<input type="text" class="sign__input"  name = "Num_Seat" style = "width:560px" value = "<?= $datas[
            'no_of_seat'
        ] ?>" readonly>
							</div>
				            

                            <div class="sign__group">
                            	<label for="" style = "color:white"> Select Booking Seat</label> <br>
								<select class="sign__input" id="select_id" name="Select_Seat" style = "width:560px" onchange="val()">
										<option value="" disabled selected>--Select--</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
								</select>
							</div>
				            

                           

							<div class="sign__group">
                            <label for="" style = "color:white"> Address:</label> <br>
								<input type="text" class="sign__input" placeholder="Enter Your Address" name = "add_1">
                                <input type="text" class="sign__input" placeholder="Enter Your City" name = "add_2">
							</div>
                            <div class="sign__group">
                            <label for="" style = "color:white"> Price Per Seat:</label> <br>
								<input type="text" class="sign__input" id = "seat_price" name = "Price" style = "width:560px" value = "<?= $datas[
            'amount_per_seat'
        ] ?>" readonly>
							</div>
                            <div class="sign__group">
                            <label for="" style = "color:white">Total Price:</label> <br>
								<input type="text" class="sign__input" placeholder="Number of Seat" id= "total_price" name = "T_price" value = "<?= $datas[
            'amount_per_seat'
        ] ?>" readonly style = "width:560px">
							</div>


							<button type = "submit" class="sign__btn" type="button" name = "btn">Book Now</button>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>


<script>
function val() {
	var seat = document.getElementById("select_id").value;
	var seat_price = document.getElementById('seat_price').value;
	var total = parseInt(seat) * parseInt(seat_price);
	document.getElementById('total_price').value = total;
    // alert(d);
}

				// var seat = document.getElementById('per_seat').value;
				// var seat_price = document.getElementById('seat_price').value;
				// var total = parseInt(seat) * parseInt(seat_price);
				// document.getElementById('total_price').value = total;
</script>

	<?php if (isset($_POST['btn'])) {
     $T_Name = $_POST['theater_name'];
     $M_Name = $_POST['movie_name'];
     $F_Name = $_POST['First_Name'];
     $L_Name = $_POST['Last_Name'];
     $N_Seat = $_POST['Num_Seat'];
     $Select_Seat = $_POST['Select_Seat'];
     $Address1 = $_POST['add_1'];
     $Address2 = $_POST['add_2'];
     $Price = $_POST['Price'];
     $T_Price = $_POST['T_price'];
     $Insquery = "insert into booking_table (Theater_Name,Movie_Name,First_Name,Last_Name,Seates_Number,address_1,address_2,Price,t_price,Select_Seat) values 
	('$T_Name','$M_Name','$F_Name','$L_Name','$N_Seat','$Address1','$Address2','$Price','$T_Price','$Select_Seat')";
     $res = mysqli_query($con, $Insquery);
     if ($res) {
         echo "<script>alert('Booking Succefully');window.location.href = 'index.php'</script>";
     } else {
         echo "<script>alert('Data not Inserted');window.location.href = 'index.php'</script>";
     }
 } ?>
