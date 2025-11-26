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
	      <form action="search.php" method="GET" class="d-flex ml-lg-4">
	        <input class="form-control" type="search" name="search" placeholder="Search anything" aria-label="Search">
	        <button class="btn btn-outline-light ml-1" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>
	<div class="row m-auto pt-5">
		<div class="col-md-6 text-center">
			<h2 class="animated-text">
			  Hi, I'm a  
			  <span class="typewrite text-decoration-none" data-period="1000" data-type='["Web Developer", "Blogger.", "Coder." ]'></span>
			    <span class="wrap"></span>
			  </a>
			</h2>

			<div class="container pt-lg-5">
				<button class="contact-btn border-0 p-2"><a class="text-white text-decoration-none" href="contact-us.php">Contact us</a></button>
			</div>
		</div>
		<div class="col-md-6 mt-5">
			<div class="w-75 bg-light m-auto shadow" style="font-size: 20px;">
				<h2 class="w-75 mt-5 text-center m-auto dynamic-text">
					Welcome to <span><img src="images/logo1.png" width="40"><b><i>Blogs</i></b></span>
				</h2>
				<p class="text-center">
					Welcome to our blogging website! Here you'll find a vibrant community of writers and readers sharing their thoughts, ideas, and experiences on a wide range of topics. From personal stories to expert insights, our platform provides a space for open discussion and creativity. Join us in exploring the many voices and perspectives that make our community unique.
				</p>
			</div>
		</div>
	</div>
</div>
	

<script>
	$(function() {
    $("button").click(function() {
        $("#icon").toggleClass("fa fa-times");
    });
	});
</script>



<!-- Animation -->
<script>
	var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap text-white">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
