<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>


<?php


            $query = "select * from movie_product Inner join movie_category on movie_category.movie_cat_id = movie_product.movie_category";
          
         
            ($Prodres = mysqli_query($con, $query)) or die('Incorrect Query!!');
        ?>

<div>



</div>


	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>NEW ITEMS</b> OF THIS SEASON</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel">

                    <?php while ($data = mysqli_fetch_assoc($Prodres)) { echo "<div class='item'>";?>
                        
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
                                <img src="<?= $data['Image']?>" alt="">
									<!-- <a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a> -->
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="MovieDetail.php?id=<?= $data['product_id']?>"><?= $data['movie_name']?></a></h3>
									<span class="card__category">
										<a href="#"><?= $data['movie_cat_name']?></a>
										
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i><?= $data['movie_release_date']?></span>
								</div>
							</div>
							<!-- end card -->
                            <?php echo "</div>" ;} ?>

					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->























<?php include 'footer.php'; ?>


   