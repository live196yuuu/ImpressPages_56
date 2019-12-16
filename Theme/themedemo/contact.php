<?php include_once('modules/header.php')?>
<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-c1','tag'=>'h2','class'=>'intro-text text-center','default'=>''))?>
                <hr>
            </div>
            <div class="col-md-8">
                <?php echo ipContent()->generateBlock('map');?>
            </div>
            <div class="col-md-4">
                <?php echo ipSlot('text',array('id'=>'phone','tag'=>'p','default'=>''))?>
                <?php echo ipSlot('text',array('id'=>'email','tag'=>'p','default'=>))?>
                <?php echo ipSlot('text',array('id'=>'address','tag'=>'p','default'=>''))?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-c2','tag'=>'h2','class'=>'intro-text text-center','default'=>'Contact form'))?>
                <hr>
                <?php echo ipContent()->generateBlock('contact-form')->asStatic()->render()?>
            </div>
        </div>
    </div>

</div>


<?php include_once('modules/footer.php')?>
