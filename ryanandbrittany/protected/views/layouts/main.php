<?php /* @var $this Controller */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<?php Yii::app()->bootstrap->register(); ?>	
</head>

<body>

	<?php
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
			<div class="item five"></div>
			<div class="item six"></div>
			<div class="item seven"></div>
			<div class="item eight"></div>
			<div class="item nine"></div>
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
		<br />
		
		
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
	'fluid'=>'true',
	'fixed'=>'top',	
	'brand'=>' ',					
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
			'htmlOptions'=>array('class'=>'pull-center'),
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'RSVP', 'url'=>'#rsvp'),
                array('label'=>'About Us', 'url'=>'#about'),
                array('label'=>'Directions', 'url'=>'#directions',)
            ),
        ),        
    ),
)); ?>
				
		<?php 
		echo $content; ?>
		
		</div>
		
	
	</div>

</body>
</html>
