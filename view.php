<?php
include "header.php";
?>

<div class="row">
    <?php
    $query = "SELECT * FROM whatsapp_groups";
    $query_run = mysqli_query($conn, $query);
    $check_groups = mysqli_num_rows($query_run) > 0;

    if ($check_groups) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="../images/logo.jfif" width="150px" height="150px" alt="whatsapp group">
                        <h3 class="class-title"><?php echo $row["g_name"]; ?></h3>
                        <p class="class-text"><?php echo $row["g_descript"]; ?></p>
                        <h5 class="class-link"><a href="<?php echo $row["g_link"]; ?>">Join Here</a></h5>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "No Whatsapp Group Found!";
    }
    ?>
</div>



<?php
include "footer.php";
?>