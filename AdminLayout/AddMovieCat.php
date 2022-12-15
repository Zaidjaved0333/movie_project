<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>


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
                            <input type="text" class="form-control input1" id="name" placeholder="Enter Your Category name" name="name">
                        </div>
                        <button type="submit" class="btn btn-success" name="ins" >Submit</button>
                    </div>   
                </div>
            </form>
        </div>
    </div>
</main>
<!-- Content End -->









       
