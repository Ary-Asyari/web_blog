<?php
/**INPUT COMMENT */
if(isset($_POST["submit"])){
	$post_id = $_POST["post_id"];
	$name = $_POST["name"];
	$commentar = $_POST["comment"];
	$date = date("Y-m-d H:i:s");
	mysqli_query($conn, "INSERT INTO comment VALUES('','$post_id','$name','$commentar','0','$date')");
	header("location:index.php?detail=$post_id&success-comment#success");
}

/**DETAIL POST */
$id_detail = $_GET["detail"];
$query_detail = mysqli_query($conn, "SELECT post.*, category.category_name, category.icon
                            FROM post, category
                            WHERE category.id = post.category_id
                            AND post.id = '$id_detail'");
?>
<?php
$query_postcatgories = mysqli_query($conn, "SELECT * FROM category ORDER BY id ASC");


/**TAMPILAN COMMENT */
$comment = mysqli_query($conn, "SELECT * FROM comment WHERE post_id = '$id_detail'
								AND STATUS = '1' ORDER BY id DESC");
$data = mysqli_num_rows($comment);
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
		    <?php if(mysqli_num_rows($query_detail)) {?>
                <?php $row=mysqli_fetch_array($query_detail) ?>
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
							<div class="float-right mx-2">
								<p><?php echo $data ?> Comments <i class="far fa-comment"></i></p>
							</div>
						</div>
							<div class="col-md-9">
								<img src="images/blog/<?php echo $row["image"] ?>" class="img-fluid">
								<h5 class="card-title font-weight-bold h4 pt-3"><a href="index.php?detail=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h5>
								<p class="card-text mb-5"><?php echo $row["description"] ?></p>	
						<!-- Komentar -->
						<div class="panel panel-default mb-3">
							<div class="panel-heading" id="success">
								<h3 class="panel-title"><span class="far fa-comment" aria-hidden="true"></span> <?php echo $data ?> Komentar</h3>
							</div>
							<div class="panel-body">
								<ul class="list-group">
								<?php if(mysqli_num_rows($comment)) {?>
									<?php while($row_comment=mysqli_fetch_array($comment)) {?>
										<li class="list-group-item">
											<strong><?php echo $row_comment["name"] ?></strong> : <?php echo $row_comment["reply"] ?>
										</li>
									<?php }?>
								<?php }?>
								</ul>
							</div>
						</div>
						<!-- Form Komentar -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fas fa-pencil-alt" aria-hidden="true"></span> Komentar</h3>
							</div>
							<div class="panel-body">
								<form method="post">
								<?php if(isset($_GET["success-comment"])) {?>
									<div class="form-group">
										<div class="col-sm-10">
											<p style="color:blue;">Terimakasih ! Komentar Anda sedang diteliti</p>
										</div>
									</div>
								<?php }?>
								<div class="form-group">
									<label for="inputNama3" class="col-sm-2 control-label">Nama</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" id="inputNama3" placeholder="Nama" name="name">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPesan3" class="col-sm-2 control-label">Pesan</label>
									<div class="col-sm-10">
									<textarea class="form-control" rows="3" placeholder="Pesan" name="comment"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default" name="submit">Kirim</button>
									<input type="hidden" name="post_id" value="<?php echo $id_detail ?>">
									</div>
								</div>
								</form>
							</div>
						</div>	 
						</div>
						</div>
            <?php } ?>
			</div>

    		<!-- RIGHT -->
    		<div class="col-md-4 col-sm-12 mb-5">
                <div class="border">

	                <div class="d-flex justify-content-center">
		                <div class="border-bottom mb-4">
						  <form class="form-inline my-4 flex-nowrap">
						    <input class="bg-info rounded-left p-2 pl-3 text-white searching" type="search" placeholder="Search Posts" aria-label="Search">
						    <button class="btn-info my-2 rounded-right p-2" type="submit"><i class="fas fa-search pr-3"></i></button>
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
