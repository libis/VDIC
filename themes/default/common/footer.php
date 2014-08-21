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
                </ul>
            </div>
            <?php fire_plugin_hook('public_footer'); ?>
        </div>
    </div>
</div>
<script type="text/javascript">// <![CDATA[
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23151310-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
// ]]></script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4de3a8704c741536"></script>
</body>
</html>