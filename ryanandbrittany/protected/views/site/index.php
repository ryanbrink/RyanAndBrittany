<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/ryanandbrittany.css');
?>
	<div id="myCarousel" class="carousel mytop slide">
		<div class="carousel-inner">
			<div class="active item one"></div>
			<div class="item two"></div>
			<div class="item three"></div>
			<div class="item four"></div>
		</div>
	</div>	

	<div class="main-content">	
		<div class="container">
			<div class="row logo">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center">
				<img src="assets/img/Logo.png" alt="Ryan + Brittany" />
			</div>
			<div class="col-md-4"></div>
		</div>
			<h2>This page exemplifies a rotating background set.</h2>
			<h4>The images will resize nicely with the browser's viewport.</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
				vitae nibh placerat mauris dignissim convallis et sed nisi. Mauris
				gravida, sapien ut viverra posuere, massa sem ultricies purus, non
				accumsan eros magna vitae metus. Sed lobortis mauris risus, id
				iaculis enim. Vestibulum ante ipsum primis in faucibus orci luctus et
				ultrices posuere cubilia Curae; Nam nec mauris arcu. Praesent
				hendrerit, velit id consequat sollicitudin, augue nibh varius dolor,
				vel viverra lacus arcu ac sapien. Nulla facilisi.</p>
			<p>Etiam et nibh sit amet nibh viverra mattis. Integer pretium
				faucibus sem, sit amet ultricies purus fermentum at. Maecenas
				dignissim, metus in tristique mattis, leo nunc sagittis sapien, eget
				pretium quam urna at enim. Cras quis massa vel massa scelerisque
				consequat. Suspendisse pulvinar elit ac dolor dictum condimentum.
				Vestibulum mattis accumsan luctus. In bibendum lorem nec dui interdum
				auctor. Sed lobortis faucibus augue, vel cursus nibh lacinia id.
				Pellentesque tincidunt, massa sit amet elementum posuere, velit nulla
				vulputate dui, vel viverra dolor nulla ut velit. In hac habitasse
				platea dictumst. Sed dictum tortor ultricies sapien cursus tincidunt.
				Nunc commodo ultrices justo, a tempor nibh bibendum a. Integer
				pulvinar justo ut diam congue eget facilisis erat sagittis.</p>
	
	
			<form class="row">
					<div class="span3">
						<label>First Name</label> <input type="text" class="span3"
							placeholder="Your First Name"> <label>Last Name</label> <input
							type="text" class="span3" placeholder="Your Last Name"> <label>Email
							Address</label> <input type="text" class="span3"
							placeholder="Your email address"> <label>Subject</label> <select
							id="subject" name="subject" class="span3">
							<option value="na" selected="">Choose One:</option>
							<option value="service">General Customer Service</option>
							<option value="suggestions">Suggestions</option>
							<option value="product">Product Support</option>
						</select>
					</div>
					<div class="span5">
						<label>Message</label>
						<textarea name="message" id="message" class="input-xlarge span5"
							rows="10"></textarea>
					</div>
	
					<button type="submit" class="btn btn-primary pull-right">Send</button>
			</form>
		</div>
	
	
	</div>

<script type="text/javascript">
	  $(document).ready(function() {
		window.setTimeout(function() { 
			$('.carousel').fadeIn(3000);
			$('.carousel').carousel({interval: 8000}); 
			}, 500);
	    
	  });
	</script>
