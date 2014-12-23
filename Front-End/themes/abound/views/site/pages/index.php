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

<h1> Most Watched Shows </h1>

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
<div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 3: College Football',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="//www.youtube.com/watch?v=wTnXgNIVZNc" target="_new">College Football</a>.<br />
            <div class = "span6">
            <img src="http://www.troika.tv/wp-content/uploads/ESPN-Logo-Resolve.jpg" title="College Football" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 4: Criminal Minds',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=CQXUirp90ko" target="_new">Criminal Minds</a>.<br />
            <div class = "span6">
            <img src="http://renewcanceltv.com/wp-content/uploads/2014/10/Criminal-Minds-11.jpg" title="Criminal Mind" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
</div>
    
<div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 5: Weather Center',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=eiypV-coHpI" target="_new">Weather Center</a>.<br />
            <div class = "span6">
            <img src="http://vector.me/files/images/2/9/29971/the_weather_channel.png" title="Weather Center" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 6: Friends',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=sLisEEwYZvw" target="_new">Friends Trailer</a>.<br />
            <div class = "span6">
            <img src="http://cdn.hellogiggles.com/wp-content/uploads/2013/12/12/friends-tv-show.jpg" title="Friends" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
</div>
    <div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 7: The Big Bang Theory',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=6NpmjgA6bS0" target="_new">The Big Bang Theory Trailer</a>.<br />
            <div class = "span6">
            <img src="http://dwldtube.com/wp-content/uploads/2013/10/The-Big-Bang-Theory-S7-iTunes.jpg" title="The Big Bang Theory" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 8: NCIS',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=F6UyiY1I5k0" target="_new">NCIS</a>.<br />
            <div class = "span6">
            <img src="http://ia.media-imdb.com/images/M/MV5BMTYyMTQ0MTU1OF5BMl5BanBnXkFtZTcwMjI0Njg4Ng@@._V1_SX640_SY720_.jpg" title="NCIS" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->

    <div class="row-fluid">
    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 9: SpongeBob SquarePants',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=CKJD563qHfI" target="_new">SpongeBob SquarePants Trailer</a>.<br />
            <div class = "span6">
            <img src="https://fanart.tv/fanart/tv/75886/tvthumb/spongebob-squarepants-4f5bb98590515.jpg" title="SpongeBob SquarePants" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    


    <div class="span6">
      <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'<span class="icon-th-large"></span>Rank 10: Forensic Files',
            'titleCssClass'=>''
        ));
        ?>
        <div class="container">
            Watch <a href="https://www.youtube.com/watch?v=-aOnk47IsmE" target="_new">Forensic Files</a>.<br />
            <div class = "span6">
            <img src="http://photos.prnewswire.com/prnvar/20140211/NY62992?max=400" title="Forensic Files" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    
	