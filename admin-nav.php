<head>
	<link rel="stylesheet" href="css/nav.css">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
</head>



<div class="nav-bg overflow-auto">
	<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
	  <div class="container-fluid">
	    <button class="navbar-toggler border border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" id="iconChange">
	    	<span>
	      		<i id="icon" class='fa-solid fa-bars text-white'></i>	    		
	    	</span>
	    </button>
	    <a class="navbar-brand text-white" href="index.php">
	    	<img src="images/logo1.png" alt="Logo"><span class="font-weight-bolder ul-font">Blogs</span>
	    </a>
	    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-lg-5 ul-font">
	        <li class="nav-item">
	          <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="about-us.php">About</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="contact-us.php">Contact us</a>
	        </li>
	      </ul>
	      <form class="d-flex ml-lg-4" action="search.php" method="GET">
	        <input class="form-control" type="search" placeholder="Search anything" aria-label="Search" name="search">
	        <button class="btn btn-outline-light ml-1" type="submit">Search</button>
	      </form>
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-lg-5 ul-font pt-2 pt-lg-0">
	      	<li class="nav-item ml-lg-2">
	      		<!-- Default dropleft button -->
				<div class="btn-group dropleft">
				  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="fa-solid fa-user"></i>
				  </button>
				  <div class="dropdown-menu">
				    <a class="text-dark text-decoration-none" href="add-category.php"><button class="dropdown-item" type="button">Add Category</button></a>
				    <a class=" text-dark text-decoration-none" href="addblog.php"><button class="dropdown-item" type="button">Add blog</button></a>
				    <a class="text-dark text-decoration-none" href="all-blogs.php"><button class="dropdown-item" type="button">Manage Blogs</button></a>
				    <a class="text-dark text-decoration-none" href="all-categories.php"><button class="dropdown-item" type="button">Manage Categories</button></a>

				    
				    <hr><a href="logout.php" class="dropdown-item text-decoration-none"><button class="border-0 bg-transparent" type="button">Logout<i class="fa-solid fa-right-to-bracket"></i></button></a>
				  </div>
				</div>
				</div>
	      	</li>
	      </ul>
	    </div>
	  </div>
	</nav>
	</div>
</div>
	

<script>
	$(function() {
    $("button").click(function() {
        $("#icon").toggleClass("fa fa-times");
    });
	});
</script>