        <div id="footer">
            <?php echo get_theme_option('Footer Text'); ?>
             <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
            <div class="navSecond">
                <ul>
                    <li class="first"><span class="page"><span class="copyright">© 2013</span> - <?php echo __('FOD Volksgezondheid, Veilighed van de Voedselketen en Leefmilieu');?></span></li>
                    <li><a href="<?php echo url(libis_get_language_slug()."about/regulations")?>" class="page"><?php echo __("Juridische informatie")?></a></li>
                    <li class="last active"><a href="<?php echo url(libis_get_language_slug()."about/privacy")?>" class="page"><?php echo __('Privacy');?></a></li>
                    <li class="last active"><a href="<?php echo url(libis_get_language_slug()."about/cookies")?>" class="page"><?php echo __('Cookies');?></a></li>
                </ul>
            </div>
            <?php fire_plugin_hook('public_footer'); ?>
        </div>
    </div>
</div>
</body>
</html>
