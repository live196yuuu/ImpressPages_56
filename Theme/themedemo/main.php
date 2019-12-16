<?php include_once('modules/header.php')?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
              <?php echo ipContent()->generateBlock('slider');?>
                <h2 class="brand-before">
                    <?php echo ipSlot('text',array('id'=>'wellcome','tag'=>'small','default'=>'Wellcome'))?>
                </h2>
                <?php echo ipSlot('text',array('id'=>'brand-name','tag'=>'h1','default'=>'FOOTBALL','class'=>'brand-name'))?>
                <hr class="tagline-divider">
                <h2>
                    <?php echo ipSlot('text',array('id'=>'btext','tag'=>'small','default'=>''))?>
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-text','tag'=>'h2','class'=>'intro-text text-center','default'=>'TIN MỚI NHẤT'))?>
                <hr>
                <?php
                $options = array(
                    'id' => 'imgHome',
                    'width' => '250',
                    'height'=>'150',
                    'class' => 'img-responsive img-border img-left',
                    'default' => ipThemeUrl('assets/img/intro-pic.jpg')
                );
                echo ipSlot('image', $options);
                ?>
                <hr class="visible-xs">
                <?php echo ipContent()->generateBlock('textContent')->render()?>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <?php echo ipSlot('text',array('id'=>'intro-text2','tag'=>'h2','class'=>'intro-text text-center','default'=>'TIN NỔI BẬT'))?>
                <hr>
                <?php echo ipBlock('main')->render(); ?>
             </div>
        </div>
    </div>

</div>

<?php include_once('modules/footer.php')?>
