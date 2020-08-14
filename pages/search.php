<?php
/**SEARCH */
if(isset($_GET["search"])){
    $_SESSION['session_search'] = $_POST["keyword"];
    $keyword = $_SESSION['session_search'];
}else{
    $keyword = $_SESSION['session_search'];
}

/** PAGING POST*/
$per_page = 5;
$cur_page = 1;
if(isset($_GET["page-search"])){
    $cur_page = $_GET["page-search"];
    $cur_page = ($cur_page > 1) ? $cur_page : 1;
}
$total_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM post WHERE title LIKE '%$keyword%'"));
$total_page = ceil($total_data/$per_page);
$offset = ($cur_page - 1) * $per_page;

/**TAMPILKAN DATA POST */
$query = mysqli_query($conn, "SELECT post.*, category.category_name, category.icon
                            FROM post, category
                            WHERE category.id = post.category_id
                            AND post.title LIKE '%$keyword%'
                            ORDER BY id DESC
                            LIMIT $per_page OFFSET $offset");

?>
<?php
$query_postcatgories = mysqli_query($conn, "SELECT * FROM category ORDER BY id ASC");
?>


<!-- BANNER -->
<div class="banner">
      <div class="container-fluid bg-color py-5 text-white">
        <div class="container py-5">
          <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="font-weight-bold display-4">Dude You're Getting a Telescope</h1>
            <p>There is moment in the life of any aspiring astronomer that it is to buy that first</p>
            <button type="button" class="btn btn-light">View More</button>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CATGORIES -->
    <div class="container text-white text-center my-5">
    	<div class="row">
    		<div class="col-md-4 col-sm-12 my-3">
    			<img src="images/blog/cat-widget1.jpg" class="position-relative img-fluid w-100">
	    		<div class="backgroundcolor position-absolute">
	    			<p class="font-weight-bold border-bottom border-white pt-4 pb-3 w-75 m-auto">SOCIAL LIFE</p>
	    			<p class="pt-1">Enjoy your social life together</p>
	    		</div>
    		</div>
    		<div class="col-md-4 col-sm-12 my-3">
    			<img src="images/blog/cat-widget2.jpg" class="position-relative img-fluid w-100">
	    		<div class="backgroundcolor position-absolute">
	    			<p class="font-weight-bold border-bottom border-white pt-4 pb-3 w-75 m-auto">POLITICS</p>
	    			<p class="pt-1">Be a part of politics</p>
	    		</div>
    		</div>
    		<div class="col-md-4 col-sm-12 my-3">
    			<img src="images/blog/cat-widget3.jpg" class="position-relative img-fluid w-100">
	    		<div class="backgroundcolor position-absolute">
	    			<p class="font-weight-bold border-bottom border-white pt-4 pb-3 w-75 m-auto">FOOD</p>
	    			<p class="pt-1">Let the food be finished</p>
	    		</div>
    		</div>
    	</div>
    </div>

    <!-- BLOG -->
    <div class="container blog">
    	<div class="row">
    		<!-- LEFT ARTICLE -->
    		<div class="col-md-8">
    			
    				 <!-- ISI ARTICLE di latest_blog.php-->
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
                                            <a class="page-link halaman" href="index.php?page-search=<?php echo $cur_page - 1?>" aria-label="Previous">
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
                                            <a class="page-link halaman" href="index.php?page-search=<?php echo $cur_page + 1?>" aria-label="Next">
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
					 
			</div>

    		<!-- RIGHT -->
    		<div class="col-md-4 col-sm-12 mb-5">
                <div class="border">

	                <div class="d-flex justify-content-center">
		                <div class="border-bottom mb-4">
						  <form class="form-inline my-4 flex-nowrap" method="post" action="index.php?search">
						    <input class="bg-info rounded-left p-2 pl-3 text-white searching" type="search" placeholder="Search Posts" aria-label="Search" name="keyword">
						    <button class="btn-info my-2 rounded-right p-2" type="submit" style="cursor:pointer;"><i class="fas fa-search pr-3" name="search"></i></button>
						  </form>
						</div>
					</div>

					<div class="d-flex justify-content-center">
				  		<p class="bg-info text-white text-center font-weight-bold h5 py-2 w-75">News</p>
				  	</div>
				  		
				  		<div class="d-flex justify-content-center mt-4">
						<div class="w-75 ">
				  			<div class="d-flex flex-nowrap">
				  			<div class="">
								<img src="images/blog/pp1.jpg" class="img-fluid">
							</div>
							<div class="ml-3">
								<h6 class="font-weight-bold text-dark">Space The Final Frontier</h6>
								<p class="">02 Hours ago</p>
							</div>
							</div>
						</div>
						</div>
						<!-- 1 -->

						<div class="d-flex justify-content-center">
						<div class="w-75 ">
				  			<div class="d-flex flex-nowrap">
				  			<div class="">
								<img src="images/blog/pp2.jpg" class="img-fluid">
							</div>
							<div class="ml-3">
								<h6 class="font-weight-bold text-dark">Space The Final Frontier</h6>
								<p class="">02 Hours ago</p>
							</div>
							</div>
						</div>
						</div>
						<!-- 2 -->

						<div class="d-flex justify-content-center">
						<div class="w-75 ">
				  			<div class="d-flex flex-nowrap">
				  			<div class="">
								<img src="images/blog/pp3.jpg" class="img-fluid">
							</div>
							<div class="ml-3">
								<h6 class="font-weight-bold text-dark">Space The Final Frontier</h6>
								<p class="">02 Hours ago</p>
							</div>
							</div>
						</div>
						</div>
						<!-- 3 -->

						
						<div class="d-flex justify-content-center mb-3">
						<div class="w-75">
				  			<div class="d-flex flex-nowrap">
				  			<div class="">
								<img src="images/blog/pp4.jpg" class="img-fluid">
							</div>
							<div class="ml-3">
								<h6 class="font-weight-bold text-dark">Space The Final Frontier</h6>
								<p class="">02 Hours ago</p>
							</div>
							</div>
							<div class="border-bottom my-3"></div>
						</div>
						</div>

						<!-- 4 -->
						
					<div class="d-flex justify-content-center">
				  		<p class="bg-info text-white text-center font-weight-bold h5 py-2 w-75">Post Catgories</p>
				  	</div>
					<?php if(mysqli_num_rows($query_postcatgories)>0) {?>
						<?php while($row=mysqli_fetch_array($query_postcatgories)) {?>
				  			<div class="d-flex justify-content-center mt-3">
				  				<div class="w-75 dotted">
					  				<div class="float-left">
										  <a href="index.php?category=<?php echo $row["id"]?>"> 
										  <?php echo $row["category_name"] ?></a>
					  				</div>
					  				<div class="float-right">
					  					<p>37</p>
					  				</div>
				  				</div>
					  		</div>
					  	<?php } ?>
					<?php } ?>
					  
				  	</div>
					</div>
                </div>
    		</div>
    	</div>
	</div>










