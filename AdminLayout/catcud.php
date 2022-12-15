








<?php include '../MainLayout/connection.php'; ?>



<!-- insert Work -->

<?php if (isset($_POST['ins'])) {
    $Name = $_POST['name'];


    $query = "insert into movie_category(movie_cat_name) values ('$Name')";

    $res = mysqli_query($con, $query);

    if ($res) {
        echo "<script>alert('Data Inserted');window.location.href = 'AddMovieCat.php'</script>";
    } else {
        echo "<script>alert('Data Insertion Failed')</script>";
    }
} ?>



<!-- update Work -->
<?php if (isset($_POST['Upd'])) {

$Name = $_POST['name'];


$query = "update movie_category set movie_cat_name = '$Name'";

$res = mysqli_query($con, $query);

if ($res) {
    echo "<script>alert('Data Updated');window.location.href = 'viewdata.php'</script>";
} else {
    echo "<script>alert('Data Updation Failed')</script>";
}
} ?>

