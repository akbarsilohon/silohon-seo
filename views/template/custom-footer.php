

    <footer class="glFo">
        <p class="arara">Powered By <a href="<?php echo SL_URI; ?>" class="glfolink"><?php echo SL_AUTHOR; ?></a></p>
    </footer>

    <script src="<?php echo SLURI . '/asset/js/search.js'; ?>"></script>
    <?php 
    
    $footerHtML = get_option('sls_hnf')['footer'];
    if(!empty($footerHtML)){
        echo $footerHtML;
    }
    
    
    wp_footer(); ?>
</body>
</html>