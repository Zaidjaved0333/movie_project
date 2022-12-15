<?php include  'header.php';?>
<?php include '../MainLayout/connection.php'; ?>

<main class="dash-content">

<a href="addtheater.php" class = "btn btn-success m-5">INSERT MORE RECORDS</a>


<?php

$querys = 'select * from theater';


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
        <th>name</th>
        <th>screen</th>
        <th>date</th>
        <th>no_of_seat</th>
        <th>amount_per_seat</th>
        <th>movie_Product</th>

        <th colspan = 2></th>
    </tr>

    <?php while($data = mysqli_fetch_assoc($res)){ echo '<tr>';?>


             
                    <td><?= @$data['name'] ?></td>
                    <td><?= @$data['screen'] ?></td>
                    <td><?= @$data['date'] ?></td>
                    <td><?= @$data['no_of_seat'] ?></td>
                    <td><?= @$data['amount_per_seat'] ?></td>
                    <td><?= @$data['movie_Product'] ?></td>

                    <td><a href="theaterEdit.php?id=<?=@$data['id'] ?>" class = "btn btn-primary">Edit</a>
                    <a href="viewMovie.php?Delid=<?=@$data['id'] ?>" class = "btn btn-danger" onclick = "return confirm('Are you sure you want to delete');return false;">Delete</a>
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

$quer = "delete from thedater where id = $DelID";

$res = mysqli_query($con, $quer);

if ($res) {
    echo "<script>alert('Data Deleted!!');window.location.href = 'viewtheater.php';</script>";

} 
mysqli_close($con);


?>

</main>


