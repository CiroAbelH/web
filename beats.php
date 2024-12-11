<?php include "templates/header.php" ?>

<section class="cards">

            <div class="cards-container">

                

                <?php
                include"conection/sections/db2.php";
                $query = "SELECT * FROM products";
                $result_tasks = mysqli_query($con, $query);


                //mysqli_fetch_array recorre todos los datos de cada columna que tenemos en nuestra tabla y se asignan a $row
                while ($row = mysqli_fetch_array($result_tasks)) { ?>
                
                    <div class="card-container">
                    <div class="card">
                        <div class="card-image">
                            <a href="#">
                                <img src="assets/img/<?php echo $row["product_image"]; ?>" alt="Poster Image">
                            </a>
                        </div>
    
                        <div class="text-card">
                            <a href="#"><?php echo $row["product_title"] ?></a>
                            <h2><?php echo $row["product_price"] ?></h2>
                        </div>
    
                    </div>    
                </div>

                
                <?php } ?>
 
            </div>  
            
        </section>
</section>

<?php include "templates/footer.php" ?>