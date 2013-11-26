<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>
<div class="container">
	<div class="span6 center">
	<hr />
		<h2 id="rsvp">Done!</h2>
		<h4>Sorry you can't make it.</h4>
		<p>If something changes, please send us an email at <a href="mailto:rsvp@ryanandbrittany.com">rsvp@ryanandbrittany.com</a>.<br />
		Thanks!<br /><br />
		<a href="<?php echo $this->createUrl('site/index'); ?>"><button type="button" class="btn btn-ttc">Back</button></a></p>
	</div>	
</div>

