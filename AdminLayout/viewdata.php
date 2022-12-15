<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>

<main class="dash-content">

<a href="AddMovieCat.php" class = "btn btn-success m-5">INSERT MORE RECORDS</a>


<?php

$querys = 'select * from movie_category';


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
        <th>Category id</th>
        <th>Category name</th>
        <th colspan = 2></th>
    </tr>

    <?php while($data = mysqli_fetch_assoc($res)){ echo '<tr>';?>


             
                    <td><?= @$data['movie_cat_id'] ?></td>
                    <td><?= @$data['movie_cat_name'] ?></td>
                    <td><a href="catedit.php?id=<?=@$data['movie_cat_id'] ?>" class = "btn btn-primary">Edit</a>
                    <a href="viewdata.php?Delid=<?=@$data['movie_cat_id'] ?>" class = "btn btn-danger" onclick = "return confirm('Are you sure you want to delete');return false;">Delete</a>
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

$quer = "delete from movie_category where movie_cat_id = $DelID";

$res = mysqli_query($con, $quer);

if ($res) {
    echo "<script>alert('Data Deleted!!');window.location.href = 'viewdata.php';</script>";

} 
mysqli_close($con);


?>

</main>


