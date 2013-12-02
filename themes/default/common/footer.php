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
<script type="text/javascript">
   var addthis_config = {
      data_ga_property: 'UA-33179353-2',
      data_ga_social: true
   };
</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4de3a8704c741536"></script>
<script>jQuery("#wegwijs").load('<?php echo WEB_ROOT.'/'.  libis_get_language_slug();?>guide/ #wegwijs');</script> 
</body>
</html>