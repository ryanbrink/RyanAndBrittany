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
						<label>First Name</label>
							<input type="text" class="span3" placeholder="Your First Name">
						<label>Last Name</label>
							<input type="text" class="span3" placeholder="Your Last Name">
						<label>Meal</label>
						<!--TODO: Probably want this to be a select? -->
							<input type="text" class="span3" placeholder="Your choice of meal">
						<label>Email Address</label>
							<input type="text" class="span3" placeholder="Your email address">
						<!--TODO: Fun css stlying to make it purdy-->
						<label>Total number of adults</label>
							<select id="adults" class="span3">
								<option value="1" selected="selected">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						<div id="additional-adults">
							<!--Place to put additional adult forms-->
						</div>
						<label>Number of kids</label>
							<select id="kids" class="span3">
								<option value="0" selected="selected">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						<div id="additional-kids">
							<!--Place to put additional kid forms-->
						</div>
					</div>
					<div class="span5">
						<label>Message</label>
						<textarea name="message" id="message" class="input-xlarge span5"
							rows="10"></textarea>
					</div>
	
					<button type="submit" class="btn btn-primary pull-right">RSVP</button>
			</form>
		</div>
	
	
	</div>

<script type="text/javascript">
	// Global variable to keep track of how many extra people we have
	var current_num_adults = 1;
	var current_num_kids = 0;

	  $(document).ready(function() {
		window.setTimeout(function() { 
			$('.carousel').fadeIn(3000);
			$('.carousel').carousel({interval: 8000}); 
			}, 500);
	    
	  });
	  
	  $("#adults").change(function() {
		// The number of adults we need
		var new_num_adults = $(this).val();

		// If we have to remove some adults
		while (current_num_adults > new_num_adults) {
			// Remove the last element from the additional adults
			$("#additional-adults").children().last().remove();
			--current_num_adults;
		}
		// If we have to add some adults
		while (new_num_adults > current_num_adults) {
			// Add a new adult the additional adults div
			$("#additional-adults").append(getPerson("Additional adult", current_num_adults));
			current_num_adults++;
		}
	  });
	  
	  $("#kids").change(function() {
		// The number of kids we need
		var new_num_kids = $(this).val();

		// If we have to remove some kids
		while (current_num_kids > new_num_kids) {
			// Remove the last element from the additional kids
			$("#additional-kids").children().last().remove();
			--current_num_kids;
		}
		// If we have to add some kids
		while (new_num_kids > current_num_kids) {
			// Add a new kid to the additional kids div
			$("#additional-kids").append(getPerson("Kid", (++current_num_kids)));
		}
	  });

	// This is just a simple function to encapsulate the form for each
	// individual person
	function getPerson(type, number) {
		return '\
		<div id="individual-person" class="form">\
			<h4>' + type + ' #' + number + ':</h4>\
			<label>First Name</label>\
				<input type="text" class="span3" placeholder="First Name">\
			<label>Last Name</label>\
				<input type="text" class="span3" placeholder="Last Name">\
			<label>Meal</label>\
				<input type="text" class="span3" placeholder="Choice of meal">\
		</div>';
	}
	</script>
