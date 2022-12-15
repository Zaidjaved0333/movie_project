<?php include 'header.php'; ?>

<?php include 'connection.php'; ?>


<?php
$ID = $_GET['id'];

$query = "select * from movie_product inner join movie_category on movie_product.movie_category =
movie_category.movie_cat_id where product_id = $ID";

$GetData = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($GetData);

print_r($res);
?>



	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"> <?= $res['movie_name'] ?> </h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-10">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
								<div class="card__cover">
									<img src= "<?= $res['Image'] ?>" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

										<ul class="card__list">
											<li>HD</li>
											<li>16+</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Category:</span> <a href="#"> <?= $res['movie_cat_name'] ?> </a>
										
										<li><span>Release Date:</span> <?= $res['movie_release_date'] ?></li>
									
									</ul>

									<div class="card__description card__description--details">
										<?= $res['movie_description'] ?>
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->
                <?php  ?>
                	<!-- accordion -->
				<div class="col-12 col-xl-12">
					<div class="accordion" id="accordion">
                    <?php
                    $query = "select * from theater inner join movie_product on movie_product.product_id = theater.movie_Product where movie_Product  = $ID";

                    $GetData = mysqli_query($con, $query);

                    // print_r[$GetData];

                    while ($data = mysqli_fetch_assoc($GetData)) {
                        echo "<div class='accordion__card'>"; ?>
						
							<div class="card-header" id="headingOne">
								<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<span><?= $data['name'] ?></span>
								</button>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>Screen</th>
												<th>Date</th>
												<th>No of Seats</th>
                                                <th>Amount per Seat</th>
                                                <th>Movie</th>

											</tr>
										</thead>

										<tbody>
											<tr>
												<th> <?= $data['screen'] ?></th>
												<td> <?= $data['date'] ?></td>
												<td> <?= $data['no_of_seat'] ?></td>
                                                <td> <?= $data[
                                                    'amount_per_seat'
                                                ] ?></td>
                                                <td> <?= $data[
                                                    'movie_name'
                                                ] ?></td>
                                                <td> <a href= "booking_form.php?BokId=<?= $data[
                                                    'id'
                                                ] ?>" class = "btn" >Book Now</a></td>
											</tr>
										
										</tbody>
									</table>
								</div>
							</div>
						
                        <?php echo '</div>';
                    }
                    ?>
					</div>
				</div>
				<!-- end accordion -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
				
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->
<?php include 'footer.php'; ?>

