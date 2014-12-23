<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Tables - CGridview and HTML';
$this->breadcrumbs=array(
    'Tables - CGridview and HTML',
);
?>
<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
	array('id'=>4, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'JavaScript','usage'=>'<span class="inlinebar">1,3,16,5,12,5</span>'),
    array('id'=>5, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'HTML','usage'=>'<span class="inlinebar">1,3,4,5,3,5</span>'),
));
?>
<br>
</br>

<br>
</br>


<h1>   </h1>

<h1> AMC Picks </h1>

<p> </p>



<div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 1: Sports Center',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href=https://www.youtube.com/watch?v=SDPsTKAA280" target="_new">Sports Center Trailer</a>.<br />
            <div class = "span6">
            <img src="http://pandodaily.files.wordpress.com/2013/11/sportscenter.jpg?w=960&h=540" title="Sports Center" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->

    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 2: Special Victims Unit',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=3bBCTKx3gTo" target="_new">Special Victims Unit</a>.<br />
            <div class = "span6">
            <img src="http://images6.fanpop.com/image/photos/37600000/Law-and-Order-SVU-law-and-order-svu-37605466-1920-1080.jpg" title="Special Victims Unit" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
</div>


    <h1>   </h1>

<h1> User Picks </h1>

<p> </p>



<div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 1',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=OBgBknbUf_E" target="_new">Breaking Bad Trailer</a>.<br />
            <div class = "span6">
            <img src="http://cloudfront-assets.reason.com/assets/mc/jsullum/2014_11/Breaking-Bad.jpg" title="Game of Thrones" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 2',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="http://www.nerdist.com/wp-content/uploads/2013/11/got-banner.jpg" title="Game of Thrones" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->

