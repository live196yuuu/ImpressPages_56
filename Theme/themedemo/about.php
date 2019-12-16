<?php include_once('modules/header.php')?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-text3','tag'=>'h2','class'=>'intro-text text-center','default'=>''))?>
                <hr>
            </div>
            <div class="col-md-6">
                <?php
                $options = array(
                    'id' => 'imgContent',
                    'width' => '540',
                    'height'=>'258',
                    'class' => 'img-responsive img-border img-left',
                    'default' => ipThemeUrl('assets/img/slide-2.jpg')
                );
                echo ipSlot('image', $options);
                ?>
            </div>
            <div class="col-md-6">
                <?php echo ipContent()->generateBlock('other-content')?>
             </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-text4','tag'=>'h2','class'=>'intro-text text-center','default'=>'Our team'))?>
                <hr>
            </div>
            <div class="col-sm-4 text-center">
                <?php echo ipSlot('image', array(
                'id' => 'imgTeam1',
                'width' => '350',
                'height'=>'210',
                'class' => 'img-responsive',
                'default' => 'http://placehold.it/750x450'
                )); ?>
                <?php echo ipSlot('text',array('id'=>'jtitle1','tag'=>'h3','default'=>'John Smith Job Title'));?>
            </div>
            <div class="col-sm-4 text-center">
                <?php echo ipSlot('image', array(
                'id' => 'imgTeam2',
                'width' => '350',
                'height'=>'210',
                'class' => 'img-responsive',
                'default' => 'http://placehold.it/750x450'
            )); ?>
                <?php echo ipSlot('text',array('id'=>'jtitle2','tag'=>'h3','default'=>'John Smith Job Title'));?>
            </div>
            <div class="col-sm-4 text-center">
                <?php echo ipSlot('image', array(
                'id' => 'imgTeam3',
                'width' => '350',
                'height'=>'210',
                'class' => 'img-responsive',
                'default' => 'http://placehold.it/750x450'
            )); ?>
                <?php echo ipSlot('text',array('id'=>'jtitle3','tag'=>'h3','default'=>'John Smith Job Title'));?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>

<?php include_once('modules/footer.php')?>
