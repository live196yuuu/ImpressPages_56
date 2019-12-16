<?php include_once('modules/header.php')?>
<div class="container blog">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center"><?php echo ipContent()->getCurrentPage()->getTitle()?></h2>
                 <hr>
                <?php echo ipContent()->generateBlock('blog-page')->render();?>
            </div>
        </div>
    </div>

</div>
<?php include_once('modules/footer.php')?>
