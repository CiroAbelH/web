<?php
include "../sections/db.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $query = "SELECT * FROM products WHERE product_id = $id";
    $result = mysqli_query($con, $query);

    //mysqly_num_rows comprueba cuantas filas tiene el resultado, en este caso se le pregunta si tiene al menos una tarea que coincide con el id hace{}
    if(mysqli_num_rows($result) == 1){
        // DEvuelve u resultado en forma de array de todos los datos dentro de la columna que se seleccionó
        $row = mysqli_fetch_array($result);
        $title = $row["product_title"];
        $price = $row["product_price"];
    }
}

if(isset($_POST["update"])){
    $id = $_GET["id"];
    $title = $_POST["title"];
    $price = $_POST["price"];

    $query = "UPDATE products set product_title = '$title', product_price = '$price' where product_id = $id";
    mysqli_query( $con, $query);

    $_SESSION["message"] = "Task Updated Successfully";
    $_SESSION["message_type"] = "info";
    header ("Location: ../crud.php");
}

?>

<?php include "../includes/header.php" ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?= $title ?>" class="form-control" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Update Price" value="<?= $price ?>" name="price" rows="2" >
                    </div>
                    <button class="btn btn-success" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "../includes/footer.php" ?>