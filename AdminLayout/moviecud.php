
<?php include '../MainLayout/connection.php'; ?>

<!-- insert Work -->

<?php if (isset($_POST['ins'])) {
    $Name = $_POST['Name'];
    $Cast = $_POST['Cast'];
    $Release = $_POST['Release'];
    $Description = $_POST['Description'];
    $cat = $_POST['Category'];

    $FileProp = $_FILES['uploaded'];
    $FileName = $_FILES['uploaded']['name'];
    $FileType = $_FILES['uploaded']['type'];
    $FileTempLoc = $_FILES['uploaded']['tmp_name'];
    $FileSize  = $_FILES['uploaded']['size'];

    $folder = "../MainLayout/assets/images/";


    if(strtolower($FileType) == "image/jpeg" || strtolower($FileType) == "image/jpg" || strtolower($FileType) == "image/png"){
             
        if($FileSize <= 1000000){ //1MB likha hai bytes mai convert kar k

                $folder = $folder.$FileName;
                $query = "insert into movie_product (movie_name,movie_cast,movie_release_date,movie_description,movie_category,Image) values ('$Name','$Cast','$Release','$Description','$cat','$folder')";
                $res = mysqli_query($con, $query);
                if ($res) {
                    echo "<script>alert('Data Inserted Successfully');window.location.href = 'ViewMovie.php';</script>";
                    move_uploaded_file($FileTempLoc,$folder);

                
                } else {
                    echo "<script>alert('Data Insertion Failed')</script>";
                }

         }   

         else{
            echo "<script>alert('Image should be less than 1MB !! ');window.location.href = 'ViewMovie.php';</script>";

         }
    }
    else{
        echo "<script>alert('Image Formate not supported!! ');window.location.href = 'ViewMovie.php';</script>";
    }
    
} ?>

<!-- update Work -->
<?php if (isset($_POST['Upd'])) {


$Id = $_POST['ProdID'];
$Name = $_POST['Name'];
$Cast = $_POST['Cast'];
$Release = $_POST['Release'];
$Description = $_POST['Description'];
$cat = $_POST['Category'];



$FileProp = $_FILES['uploaded'];
$FileName = $_FILES['uploaded']['name'];
$FileType = $_FILES['uploaded']['type'];
$FileTempLoc = $_FILES['uploaded']['tmp_name'];
$FileSize  = $_FILES['uploaded']['size'];

$folder = "../MainLayout/assets/images/";

if (is_uploaded_file($_FILES['uploaded']['tmp_name'])) {
    if(strtolower($FileType) == "image/jpeg" || strtolower($FileType) == "image/jpg" || strtolower($FileType) == "image/png"){
            
        if($FileSize <= 1000000){ //1MB likha hai bytes mai convert kar k

                $folder = $folder.$FileName;
                
                $query = "update movie_product set movie_name = '$Name',movie_cast = '$Cast',movie_release_date = '$Release',movie_description = '$Description',movie_category  = '$cat',
                Image = '$folder' where product_id = '$Id'";

                
                    $res = mysqli_query($con, $query);

                    if ($res) {
                        echo "<script>alert('Data Updated');window.location.href = 'ViewMovie.php'</script>";
                        move_uploaded_file($FileTempLoc,$folder);

                    } else {
                        echo "<script>alert('Data Updation Failed');window.location.href = 'ViewMovie.php'</script>";
                    }
                

        }   

        else{
            echo "<script>alert('Image should be less than 1MB !! ');window.location.href = 'ViewMovie.php';</script>";

        }
    }
    else{
        echo "<script>alert('Image Formate not supported!! ');window.location.href = 'ViewMovie.php';</script>";
    }
}
else{

    $query = "update movie_product set movie_name = '$Name',movie_cast = '$Cast',movie_release_date = '$Release',movie_description = '$Description',movie_category  = '$cat'
    where product_id = '$Id'";

    $res = mysqli_query($con, $query);
    if ($res) {
        move_uploaded_file($FileTempLoc, $folder);
        echo "<script>alert('Data Updated Successfully');window.location.href = 'viewdataproduct.php';</script>";
    } else {
        echo "<script>alert('Data Updation Failed');window.location.href = 'viewdataproduct.php';</script>";
    }
}

} ?>

