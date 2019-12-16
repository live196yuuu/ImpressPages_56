
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php echo ipSlot('text',array('id'=>'copyright','tag'=>'p','default'=>'Copyright'))?>
            </div>
        </div>
    </div>
</footer>
<?php
    ipAddJs('../assets/js/bootstrap.min.js');
    echo ipJs();
?>

<script>
    $('.carousel').carousel({
        interval: 5000 
    })
</script>
</body>
</html>
