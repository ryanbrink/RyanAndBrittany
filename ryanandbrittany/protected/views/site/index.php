<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>
		
<h2 id="rsvp">RSVP</h2>
<h4>Let us know you'll be here</h4>
<p>If you've received an invitation for our wedding, 
please use the form below to let us know that you will 
be attending, and who will be joining you.<br /><br /></p>

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
			<label>How many children are you bringing?</label>
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
			<label>Note</label>
			<textarea name="message" id="message" placeholder="Anything else we should know about?" class="span3"
				rows="10"></textarea>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>		
		<div class="span6">
		We're so glad you can be at our special day! Please fill in your information, as well as your date and any children you will be bringing. There is a nursery available at New Testament Church, so please feel free to bring your kids.
		<br /><br />
		The meal will be buffet style: gluten and dairy free potatoes, vegetables, and your choice of beef or chicken.
		<br /><br />
		If you have any issues with the form, feel free to simply email <a href="mailto:rsvp@ryanandbrittany.com">rsvp@ryanandbrittany.com</a>, or call 613-362-2609.				

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
			$("#additional-kids").append(getPerson("Child", (++current_num_kids)));
		}
	  });

	// This is just a simple function to encapsulate the form for each
	// individual person
	function getPerson(type, number) {
		return '\
		<div id="individual-person" class="form">\
			<h4>' + type + ' ' + number + ':</h4>\
			<label>First Name</label>\
				<input type="text" class="span3" placeholder="First Name">\
			<label>Last Name</label>\
				<input type="text" class="span3" placeholder="Last Name">\
			<label>Meal</label>\
				<input type="text" class="span3" placeholder="Choice of meal">\
		</div>';
	}
	</script>
