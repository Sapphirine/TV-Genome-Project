<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Graphs & Charts';
$this->breadcrumbs=array(
	'Graphs & Charts',
);
?>
<div class="page-header">
  <h1>Twitter Sentiment Analysis</h1>
</div>

<div class="row-fluid">
  <div class="span12">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-user'></i> Number of Tweets: Breaking Bad",
		));
	?>
  		<div class="auto-update-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
	<?php $this->endWidget();?>
  </div>
  

<div class="row-fluid">
  <div class="span12">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-user'></i> Breaking Bas vs Game of Thrones: Hourly Number of Tweets",
		));
		
	?>
    	<div class="visitors-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>
</div>


<div class="row-fluid">
  
  <div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-arrow-down'></i> Sentiments Breaking Bad",
		));
		
	?>
    	<div class="order-bars-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>
  <div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-pencil'></i> Sentiments: Game of Thrones",
		));
		
	?>
  		<div class="stacked-bars-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
	<?php $this->endWidget();?>
  </div>
</div>

<div class="row-fluid">
 	<div class="span3">
 	</div>

  	<div class="span6">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon-info-sign'></i> Breaking Bad: Sentiments Pie chart",
		));
		
	?>
    <div class="pieStats" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
    <?php $this->endWidget();?>
  </div>
</div>

