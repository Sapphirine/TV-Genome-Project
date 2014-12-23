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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
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
            Watch <a href="https://www.youtube.com/watch?v=cRopdSKJlQ4" target="_new">Game of Thrones Trailer</a>.<br />
            <div class = "span6">
            <img src="images/game.jpg" title="Game of Thrones" />
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div><!--/span-->
    
  