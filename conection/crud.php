<?php include"sections/db.php"?>
<?php include"includes/header.php"?>

<?php
//Si estando la sesion activa trata de ir a login se redirige automaticamente a index.php
if(isset($_SESSION["user_id"])){
    header ("Location: ../index.php");
}
?>
<?php if(isset($_SESSION["admin_name"])){ ?>
        <p>Bienvenido: <?= $_SESSION["admin_name"] ?></p>
        <?php }?>
<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <div class="card card-body">
                <!--Envia los datos del formulario a save_task.php-->
                <form action="form_action/save_task.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Product Title"   autofocus required >
                    </div>
                    <br>
                    <div class="form-group">
                        <input required name="price" placeholder="Product Price">
                    </div>
                    <br>
                    <div class="form-group">
                        <input required type="file" name="cover" class="form-control" placeholder="Cover" autofocus >
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task" >
                </form>
            </div>
        </div>

        <div class="col-md-8">
                <table class="table table-bordered" >
                    <thead>
                        <th>Title</th>
                        <th>Cover</th>
                        <th>price</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM products";
                            $result_tasks = mysqli_query( $con, $query );


                                //mysqli_fetch_array recorre todos los datos de cada columna que tenemos en nuestra tabla y se asignan a $row
                            while($row = mysqli_fetch_array($result_tasks)){ ?>

                            <tr>
                                <td><?php echo $row["product_title"] ?></td>
                                <td><?php echo $row["product_image"] ?></td>
                                <td><?php echo $row["product_price"] ?></td>
                                <td><?php echo $row["created_at_product"] ?></td>

                            <!--ACTIONS-->
                                <td>
                            <!-- Con el ? se concatena otra informacion en un a-->
                                    <a class="btn btn-secondary" href="form_action/edit.php?id=<?php echo $row["product_id"] ?>"><box-icon type='solid' name='edit'></box-icon></a>
                                    <a class="btn btn-danger" href="form_action/delete_task.php?id=<?php echo $row["product_id"] ?>"><box-icon name='x'></box-icon></a>
                                </td>
                            </tr>

                        <?php } ?>
                        
                    </tbody>
                </table>
        </div>

    </div>
</div>


<?php include"includes/footer.php"?>