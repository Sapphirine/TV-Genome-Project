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

    <div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 3',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=ZR95iii14l8" target="_new">Planet Earth Trailer</a>.<br />
            <div class = "span6">
            <img src="http://www.prosoundeffects.com/blog/wp-content/uploads/2010/07/planet-earth.jpg" title="Planet Earth" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 4',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=XFF2ECZ8m1A" target="_new">Cosmos:A SpaceTime Odyssey Trailer</a>.<br />
            <div class = "span6">
            <img src="https://lh5.ggpht.com/ouyiPff2FqEFgR4cmo3UR4plzeEPOaBnJ5I7AEfMRMwjgQpFXmQQbah2frkb89A22ME=w1264" title="Game of Thrones" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->

    <div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 5',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=e654vHU1MH4" target="_new">Last Week Tonight with John Oliver Trailer</a>.<br />
            <div class = "span6">
            <img src="http://www.addictinginfo.org/wp-content/uploads/2014/10/Last-Week-Tonight-with-John-Oliver.jpg" title="Last Week Tonight with John Oliver" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 6',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=wrN2k3qGbVA" target="_new">The Sopranos Trailer</a>.<br />
            <div class = "span6">
            <img src="http://4.bp.blogspot.com/-98YVskFh2ws/T5vRaqieC6I/AAAAAAAABXk/mq3mnhe_Og4/s1600/7428-3-the_sopranos_-_8.jpg" title="The Sopranos" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->

    <div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 7',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=TXwCoNwBSkQ" target="_new">True Detective Trailer</a>.<br />
            <div class = "span6">
            <img src="http://lovecraftzine.files.wordpress.com/2014/08/true-detective.jpg?w=1200" title="True Detective" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 8',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=-egQ79OrYCs" target="_new">Avatar:The Last Airbender Trailer</a>.<br />
            <div class = "span6">
            <img src="http://www.the-numbers.com/video/Last-Airbender-The/Last-Airbender-The-poster.jpg" title="Avatar:The Last Airbender" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->

    <div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 9',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=mG9bSBGLtMc" target="_new">Firefly Trailer</a>.<br />
            <div class = "span6">
            <img src="http://ewinsidetv.files.wordpress.com/2011/02/firefly_series_main.jpg" title="Firefly" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 10',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=F2KnFDfHm4o" target="_new">Rick and Morty Trailer</a>.<br />
            <div class = "span6">
            <img src="http://cdn.bloody-disgusting.com/wp-content/uploads/2014/01/rick-and-morty.jpg" title="Rick and Morty" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    
	