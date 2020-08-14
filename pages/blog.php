

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
					 <?php include "latest_blog.php" ?>
					 
					 
    			
			
			
    		
			</div>

    		<!-- RIGHT -->
    		<div class="col-md-4 col-sm-12">
                <div class="border">

	                <div class="d-flex justify-content-center">
		                <div class="border-bottom mb-4">
						  <form class="form-inline my-4 flex-nowrap" method="post" action="index.php?search">
						    <input class="bg-info rounded-left p-2 pl-3 text-white searching" type="search" placeholder="Search Posts" aria-label="Search" name="keyword">
						    <button class="btn-info my-2 rounded-right p-2" type="submit" name="search" style="cursor:pointer;"><i class="fas fa-search pr-3"></i></button>
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
