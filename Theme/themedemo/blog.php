<?php include_once('modules/header.php')?>
<div class="container blog">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-b1','tag'=>'h2','class'=>'intro-text text-center','default'=>'Company blog'))?>
                <hr>
                <?php echo ipContent()->generateBlock('blog')->render();?>
            </div>
        </div>
    </div>

</div>
<?php include_once('modules/footer.php')?>
