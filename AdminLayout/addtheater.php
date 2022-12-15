<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<!-- Content Start -->

<main class="dash-content">
    <div class="content">
      


        <div class="container"> <br>
            <h3 >Insert Data In DataBase</h3> <br>

            <form action="theatercud.php" method="post"  enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12 col-lg-6" >
                        <div class="form-group wrap-input1">
                        <label for="name">Select theater name:</label>
                            <select class="form-control wrap-input1"  name="theater">
                            <option value="">--select--</option>
                            <option value="bronze theater">bronze theater</option>
                            <option value="silver theater">silver theater</option>
                            <option value="gold theater">gold theater</option>
                            <option value="Diamond theater">Diamond theater</option>
                        
                            
                        </select>
                            
                        <label for="name">Select screen:</label>
                            <input type="text" class="form-control input1" id="Release" placeholder="Enter Movie screen" name="screen" id="datepicker">
             
                            <label for="name">Movie Date:</label>
                            <input type="text" class="form-control input1" id="Release" placeholder="Enter Movie date" name="date" id="datepicker">
                            <label for="name">No of seat</label>
                            <input type="text" class="form-control input1" id="Description" placeholder="No of Seat" name="seats">
                            <label for="name">Amount of Seat</label>
                            <input type="text" class="form-control input1" id="Release" placeholder="Enter Movie date" name="AmSeat" id="datepicker">
                        

                            <label for="name">Select movie:</label>
                            <select class="form-control wrap-input1" id="cat" name="Movie">
                            <option value="">--Select--</option>
                                <!-- Get dropdown data code -->

                                <?php
                                    $query = "select * from movie_product";
                                    $rs = mysqli_query($con,$query);
                                    if(mysqli_num_rows($rs) > 0){
                                        while($data  = mysqli_fetch_array($rs)){?>
                                <option value="<?= $data['product_id']?>"><?= $data['movie_name']?></option>
                                <?php
                                }
                                }else{  ?>
                                <option>NO records Found</option>
                                <?php } ?>

                            
                        </select>

                        <button type="submit" class="btn btn-success mt-5" name="ins" >Submit</button>

                        </div>
                    </div>  
                    
   

                </div>
            </form>
        </div>
    </div>
</main>
<!-- Content End -->








       
