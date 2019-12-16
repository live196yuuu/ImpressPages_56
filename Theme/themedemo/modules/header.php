<?php echo ipDoctypeDeclaration(); ?>
<html<?php echo ipHtmlAttributes(); ?>>
<head>
    <?php
        ipAddCss('../assets/css/bootstrap.min.css');
        ipAddCss('../assets/css/themedemo.css');
        echo ipHead();
    ?>
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
<?php echo ipSlot('text',array('id'=>'brand','tag'=>'div','class'=>'brand','default'=>'FOOTBALL'))?>
<?php echo ipSlot('text',array('id'=>'address-bar','tag'=>'div','class'=>'address-bar','default'=>'FOOTBAL HOT NEW'))?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
       
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           
            <a href="/">
                <?php echo ipSlot('text',array('id'=>'navbar-brand','tag'=>'div','class'=>'brand','default'=>'Business Casual'))?>
            </a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <?php echo ipSlot('menu', 'menu1'); ?>
            </ul>
        </div>
       
    </div>
 
</nav>

