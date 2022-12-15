<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>
<style>
 
.table .table-dark th {
 
  color: #fff;
 
  background-color: #620000;
 
  border-color: #FF8888;
 
}
 
</style>

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="assets/img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h1 class="section__title">Booking Details</h1>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Booking</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
    <?php
    $querys = 'select * from booking_table';
    ($res = mysqli_query($con, $querys)) or die('Incorrect Query!!');
    $rowCount = mysqli_num_rows($res);
    ?>
<div class="section">
		
					<table class=" container table table-dark  table-bordered table-striped" style = "width:80%; color:white">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Movie Name</th>
                                <th>Theater Name</th>
                                <th>Address</th>
                                <th>Selected Seats</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($res)) {
                                echo '<tr>'; ?>
                                    <td><?= $data['First_Name'] ?></td>
                                    <td><?= $data['Movie_Name'] ?></td>
                                    <td><?= $data['Theater_Name'] ?></td>
                                    <td><?= $data['address_1'] ?></td>
                                    <td><?= $data['Select_Seat'] ?></td>
                                    <td><?= $data['t_price'] ?></td>
                                 
                                    
                            <?php echo '</tr>';
                            } ?>
                        </tbody>
                    </table>
				
	</div>



<?php include 'footer.php'; ?>
