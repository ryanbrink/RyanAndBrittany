<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>
		
<h2 id="rsvp">RSVP</h2>
<h4>Let us know you'll be here</h4>
<p>If you've received an invitation for our wedding, 
please use the form below to let us know that you will 
be attending, and who will be joining you.<br /><br /></p>

<form action="index.php?r=site/confirm" method="post" name="ContactForm" class="container">
		<strong>I am coming</strong>
				<input name="coming" id="coming" type="checkbox" style="margin-bottom: 10px">
		<div class="row">		
			<div class="span3">
				<label><strong>Name</strong></label>
					<input name="fName" type="text" class="span3" placeholder="First">
					<input name="lName" type="text" class="span3" placeholder="Last">
				<label><strong>Email Address</strong></label>
					<input name="email" type="text" class="span3" placeholder="Your email address">
				<div class="hidden-form" id="meal-form" style="display: none">
					<label><strong>Your meal</strong></label>
						<small>The meal will be buffet style: gluten and dairy free potatoes, vegetables, and your choice of beef or chicken.</small>		
							<select name="meal" id="meal" class="span3">
								<option value="0" selected="selected">Chicken</option>
								<option value="1">Roast Beef</option>
							</select>
				</div>
			</div>
			<div id="date-info" class="span3 hidden-form" style="visibility: hidden">	
				<strong>Bringing a date?</strong> <input name="date" id="date" type="checkbox">
				<div id="date-form" style="visibility: hidden">
					<h4>Date's information:</h4>
					<label><strong>Name</strong></label>
					<input name="date-fName"  type="text" class="span3" placeholder="First">
					<input name="date-lName" type="text" class="span3" placeholder="Last">
					<label><strong>Meal</strong></label>
						<select name="date-meal" id="meal" class="span3">
							<option value="0" selected="selected">Chicken</option>
							<option value="1">Roast Beef</option>
						</select>
				</div>	
			</div>
			<div id="kid-info" class="span5 hidden-form" style="visibility: hidden">			
				<label><strong>How many children are you bringing?</strong></label>
				<small>There is a nursery available at New Testament Church, so please feel free to bring your kids.</small>
				<br />
					<select name="kids" id="kids" class="span3">
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
		</div>
		<br /><br />
		<div class="row">
			<div class="span3">
				<label><strong>Note</strong></label>
				<textarea name="message" id="message" placeholder="Anything else we should know about?" class="span3"
					rows="10"></textarea>				
			</div>		
			<div class="span6">
			<br />
			We're so glad you can be at our special day!
			<br /><br />
			If you have any issues with the form, feel free to simply email <a href="mailto:rsvp@ryanandbrittany.com">rsvp@ryanandbrittany.com</a>, or call 613-362-2609.				
			<br /><br />
			<button type="submit" class="btn btn-ttc">Submit</button>
			</div>
		</div>	
</form>
<hr />
<h2 id="about">About Us</h2>
<h4>A little bit about Ryan and Brittany</h4>
<p>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br /></p>
<hr />
<h2 id="directions">Directions</h2>
<h4>How to get to our big day</h4>
<p>Our wedding will be held at New Testament Church 
which is at 
<a href="https://maps.google.com/maps?q=New+Testament+Church,+Andrews+Street,+Massena,+NY,+USA&hl=en&ll=44.923123,-74.91457&spn=0.112794,0.264187&sll=37.0625,-95.677068&sspn=63.343847,135.263672&oq=new+&t=m&hq=New+Testament+Church,&hnear=Andrews+St,+Massena,+St+Lawrence,+New+York+13662&z=13&iwloc=A">
265 Andrews Street in Massena, New York</a>.

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</p>
		

<script type="text/javascript">
	// Global variable to keep track of how many extra kids we have
	var current_num_kids = 0;

	  $(document).ready(function() {
		window.setTimeout(function() { 
			$('.carousel').fadeIn(3000);
			$('.carousel').carousel({interval: 8000}); 
			}, 500);
	    
	  });
	  
	  $("#date").change(function() {
		if ($(this).is(":checked")) {
			$("#date-form").css("visibility", "visible");
		}
		else {
			$("#date-form").css("visibility", "hidden");
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
			$("#additional-kids").append('\
				<div id="kid-' + (++current_num_kids) + '-info" class="form">\
					<h4>Child ' + current_num_kids + '\'s information:</h4>' +
					getPersonForm("kid", current_num_kids) + 
				'</div>');
		}
	  });
	  
	  $("#coming").change(function() {
		if ($(this).is(":checked")) {
			// Coming; show extra forms
			$("#meal-form, #greeting").show();
			$("#date-info, #kid-info").css("visibility", "visible");
		}
		else {
			// Hide extra forms
			$("#meal-form, #greeting").hide();
			$("#date-info, #kid-info").css("visibility", "hidden");
		}
	  });

	// This is just a simple function to encapsulate the form for each
	// individual person
	function getPersonForm(type, num) {
		return '\
			<label><strong>Name</strong></label>\
				<input name="' + type + '-' + num + '-fName"  type="text" class="span3" placeholder="First">\
				<input name="' + type + '-' + num + '-lName" type="text" class="span3" placeholder="Last">\
			<label><strong>Meal</strong></label>\
				<select name="' + type + '-' + num + '-meal" id="meal" class="span3">\
					<option value="0" selected="selected">Chicken</option>\
					<option value="1">Roast Beef</option>'
	}
	</script>
