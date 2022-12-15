<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>

<main class="dash-content">

<a href="AddMovie.php" class = "btn btn-success m-5">INSERT MORE RECORDS</a>


<?php

$querys = 'select * from movie_product';


$res = mysqli_query($con, $querys) or die ("Incorrect Query!!");

// $data = mysqli_fetch_assoc($res);

$rowCount = mysqli_num_rows($res);

// echo "<pre>";
//     print_r($data);
// echo "</pre>";
?>


<?php
if($rowCount > 0){
 ?>


 <table class=" container table table-stripped table-bordered" style = "width:80%">

    <tr>
        <th>product_id</th>
        <th>movie_name</th>
        <th>movie_cast</th>
        <th>movie_release_date</th>
        <th>movie_category</th>
        <th>movie_description</th>
        <th>movie_image</th>

        <th colspan = 2></th>
    </tr>

    <?php while($data = mysqli_fetch_assoc($res)){ echo '<tr>';?>


             
                    <td><?= @$data['product_id'] ?></td>
                    <td><?= @$data['movie_name'] ?></td>
                    <td><?= @$data['movie_cast'] ?></td>
                    <td><?= @$data['movie_release_date'] ?></td>
                    <td><?= @$data['movie_category'] ?></td>
                    <td><?= @$data['movie_description'] ?></td>
                    <td><img src="<?= @$data['Image'] ?>" alt=""  width = 100px height = 100px></td>

                    <td><a href="movieEdit.php?id=<?=@$data['product_id'] ?>" class = "btn btn-primary">Edit</a>
                    <a href="viewMovie.php?Delid=<?=@$data['product_id'] ?>" class = "btn btn-danger" onclick = "return confirm('Are you sure you want to delete');return false;">Delete</a>
                    </td>
               

    <?php echo '</tr>';}?>
              
 </table>

 <?php
}
else{
        echo "<h5 class='text-danger'>No Record found</h5>";
}



error_reporting(0);
$DelID = $_GET['Delid'];

$quer = "delete from movie_product where product_id = $DelID";

$res = mysqli_query($con, $quer);

if ($res) {
    echo "<script>alert('Data Deleted!!');window.location.href = 'viewMovie.php';</script>";

} 
mysqli_close($con);


?>

</main>


