<head>
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>

	<style>
		.navbar{
			background-image: linear-gradient(to right, purple 50%, blue);
		}
		.nav-link:hover{
			background-color: black;
		}
		form .form-control:active{
			background-color: black;
			box-shadow: brown;
		}
		.ul-font{
			font-size: 20px;
		}
	</style>
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
	      <form class="nav-item d-flex ml-lg-4 mb-0" action="search.php" method="GET">
	        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
	        <button class="btn btn-outline-light ml-1" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>
</div>