<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>


<!-- Content Start -->

<main class="dash-content">
    <div class="content">
      


        <div class="container"> <br>
            <h3 >Insert Data In DataBase</h3> <br>

            <form action="moviecud.php" method="post"  enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-12 col-lg-6" >
                        <div class="form-group wrap-input1">
                            <label for="name">Movie Name:</label>
                            <input type="text" class="form-control input1" id="Name" placeholder="Enter Movie name" name="Name">
                            <label for="name">Movie Cast:</label>
                            <input type="text" class="form-control input1" id="Cast" placeholder="Enter Movie cast" name="Cast">
                            <label for="name">Movie Release Date:</label>
                            <input type="text" class="form-control input1" id="Release" placeholder="Enter Movie release date" name="Release">
                            <label for="name">Movie Description:</label>
                            <input type="text" class="form-control input1" id="Description" placeholder="Enter Movie description" name="Description">
                            

                            <label for="name">Select Category:</label>
                            <select class="form-control wrap-input1" id="cat" name="Category">
                            <option value="">--Select--</option>
                                <!-- Get dropdown data code -->

                                <?php
                                    $query = "select * from movie_category";
                                    $rs = mysqli_query($con,$query);
                                    if(mysqli_num_rows($rs) > 0){
                                        while($data  = mysqli_fetch_array($rs)){?>
                                <option value="<?= $data['movie_cat_id']?>"><?= $data['movie_cat_name']?></option>
                                <?php
                                }
                                }else{  ?>
                                <option>NO records Found</option>
                                <?php } ?>

                            
                        </select>

                        <button type="submit" class="btn btn-success mt-5" name="ins" >Submit</button>

                        </div>
                    </div>  
                    
                    

                <div class="col-sm-12 col-lg-4 ">
                    <div class="d-flex flex-column align-items-center text-center  user-profile-image">

                        <input class="form-control hidden" type="file" id="Pro_Image" name="uploaded"
                            style="visibility: hidden;" />

                        <img class="mt-5" style="width:250px;" src="assets/images/noImg.jpg" id="UserImage">
                        <div class="upload-photo text-center ">
                            <br />
                            <button type="button" class="btn btn-success"
                                onclick="document.getElementById('Pro_Image').click(); return false;">
                                <i class="fas fa-download"></i> Upload Image
                            </button>
                        </div>
                    </div>

                </div>


                </div>
            </form>
        </div>
    </div>
</main>
<!-- Content End -->

<script>
$(document).ready(function() {


    $("#upload-photos").click(function () {
       $("#BrowseImage").trigger('click')
    })

    $("#UserImage").click(function() {
        $("#Pro_Image").trigger('click')
    })


    $("#Pro_Image").change(function() {
        if (this.files && this.files[0]) {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(this.files[0]);
            fileReader.onload = function(x) {

                $("#UserImage").attr('src', x.target.result);
            }
        }
    })
})
</script>







       
