<?php

/** PAGING POST*/
$per_page = 5;
$cur_page = 1;
if(isset($_GET["page"])){
    $cur_page = $_GET["page"];
    $cur_page = ($cur_page > 1) ? $cur_page : 1;
}
$total_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM post"));
$total_page = ceil($total_data/$per_page);
$offset = ($cur_page - 1) * $per_page;

/**TAMPILKAN DATA POST */
$query = mysqli_query($conn, "SELECT post.*, category.category_name, category.icon
                            FROM post, category
                            WHERE category.id = post.category_id
                            ORDER BY id DESC
                            LIMIT $per_page OFFSET $offset");

?>


<?php if(mysqli_num_rows($query)) {?>
    <?php while($row=mysqli_fetch_array($query)) {?>
        <div class="row mb-5">
        <div class="col-md-3">
            <div class="float-right mx-2">
                <p>Mark Wiens <i class="far fa-user"></i></p>
            </div>
            <div class="float-right ml-5 pl-3 mr-2">
                <p><?php echo $row["category_name"] ?>  <i class="<?php echo $row["icon"] ?>"></i></p>
            </div>
            <div class="text-right ml-5 mr-2">
                <p><?php echo tgl_indonesia($row["date"]) ?> <i class="far fa-calendar"></i></p>
            </div>
            <div class="float-right mx-2">
                <p>1.2M Views <i class="fas fa-eye"></i></p>
            </div>
        </div>
            <div class="col-md-9">
                <img src="images/blog/<?php echo $row["image"] ?>" class="img-fluid">
                <h5 class="card-title font-weight-bold h4 pt-3 mb-3"><a href="index.php?detail=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h5>
                
            </div>
        </div>
    <?php } ?>
<?php } ?>

<?php if(isset($total_page)) {?>
    <?php if($total_page > 1) {?>
        <nav aria-label="..." class="mb-5">
            <ul class="pagination justify-content-center">
                <?php if($cur_page > 1) {?>
                    <li class="page-item">
                        <a class="page-link halaman" href="index.php?page=<?php echo $cur_page - 1?>" aria-label="Previous">
                            <span aria-hidden="true">Prev</span>
                        </a>
                    </li>
                <?php }else{ ?>
                    <li class="page-item">
                        <a class="page-link salah" aria-label="Previous">
                            <span aria-hidden="true">Prev</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if($cur_page < $total_page) {?>
                    <li class="page-item">
                        <a class="page-link halaman" href="index.php?page=<?php echo $cur_page + 1?>" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                <?php }else{ ?>
                    <li class="page-item">
                        <a class="page-link salah" aria-label="Next">
                            <span aria-hidden="true" disabled>Next</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    <?php } ?>
<?php } ?>