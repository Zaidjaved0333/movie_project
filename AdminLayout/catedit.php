<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>


<?php
    $ID = $_GET['id']; //3
    $query = "select * from movie_category where movie_cat_id  = $ID"; //3 //img1 //abc

    $GetData = mysqli_query($con,$query);

    $res = mysqli_fetch_assoc($GetData); //$res[Name] //abc

    // print_r($res);

   
?>
<!-- Content Start -->

<main class="dash-content">
    <div class="content">
      


        <div class="container"> <br>
            <h3 >Insert Data In DataBase</h3> <br>

            <form action="catcud.php" method="post">

                <div class="row">
                    <div class="col-sm-12 col-lg-6" >
                        <div class="form-group wrap-input1">
                            <label for="name">CategoryName:</label>
                            <input type="text" class="form-control input1" id="name" placeholder="Enter Your Category name" name="name" value =  "<?=  $res['movie_cat_name'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success" name="Upd" >Update</button>
                    </div>   
                </div>
            </form>
        </div>
    </div>
</main>
<!-- Content End -->




