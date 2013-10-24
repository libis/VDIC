        <div id="footer">
            <?php echo get_theme_option('Footer Text'); ?>
             <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
            <div class="navSecond">
                <ul>
                    <li class="first"><span class="page"><span class="copyright">© 2013</span> - FOD Volksgezondheid, Veilighed van de Voedselketen en Leefmilieu</span></li>
                    <li><a href="#" class="page">Juridische informatie</a></li>
                    <li class="last active"><a href="<?php echo url("privacy")?>" class="page">Privacy</a></li>
                </ul>
            </div>
            <?php fire_plugin_hook('public_footer'); ?>
        </div>
    </div>
</div>
 <script>jQuery("#wegwijs").load('/wegwijs/ #wegwijs');</script> 
</body>
</html>