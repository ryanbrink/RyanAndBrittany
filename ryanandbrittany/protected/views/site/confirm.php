<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>
<div class="container">
	<div class="span6 center">
	<hr />
		<h2 id="rsvp">Done!</h2>
		<h4>We're more excited than you are.</h4>
		<p>We've received your RSVP. We'll send you a quick email to confirm that we're saving you a seat. If anything changes, simply send us an email at <a href="mailto:rsvp@ryanandbrittany.com">rsvp@ryanandbrittany.com</a>.<br />
		Thanks!<br /><br />
		<a href="<?php echo $this->createUrl('site/index'); ?>"><button type="button" class="btn btn-ttc">Back</button></a></p>
	</div>	
</div>

