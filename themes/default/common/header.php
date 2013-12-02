<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->

    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Stylesheets -->
    <?php   
        
    queue_css_file('fod-health');
    queue_css_file('fod-Health-main');
    queue_css_file('fod-health-ie','all','<!--[if IE]>');
    queue_css_file('fod-health-ie6','all','<!--[if IE 6]>');
    queue_css_file('belgium_header');
    queue_css_file('fod-health-print','print');
    //queue_css_url('http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
    echo head_css();

    echo theme_header_background();
    ?>
    <style>
        #site-title a:link, #site-title a:visited,
        #site-title a:active, #site-title a:hover {
            color: #<?php echo ($titleColor = get_theme_option('header_title_color')) ? $titleColor : "000000"; ?>;
            <?php if (get_theme_option('header_background')): ?>
            text-shadow: 0px 0px 20px #000;
            <?php endif; ?>
        }
    </style>
    <!-- JavaScripts -->
    <?php 
    queue_js_file('vendor/modernizr');
    queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)'));
    queue_js_file('vendor/respond');
    queue_js_file('fod-health');
    queue_js_file('globals');
    echo head_js(); 
    ?>
    <script>
    jQuery('document').ready(function(){
        //only show links of current language
        jQuery('.navigation li').each(function(){
            var that = jQuery(this);
            var link = jQuery('a',that).attr('href');
            if(link.indexOf('fr/')==-1 && link.indexOf('nl/')==-1 && link.indexOf('de/')==-1 && link.indexOf('en/')==-1){
                that.show();
            }
            if(link.indexOf('<?php echo libis_get_language_slug(); ?>')!=-1){
                that.show();
            }
        });
    });
    </script>
</head>
<body id="topic" class="">
<div id="allContainer">	
    <div class="skipLinks">
        <a href="#content">Navigatie overslaan</a>
    </div>
    <div class="allWrap1">
        <div id="header">
            <div id="blgm_belgiumHeader">
                <div class="blgm_wrapper">
                    <div id="blgm_beLogo">                        
                        <img src="<?php echo img('blgm_beLogo.gif'); ?>" alt="Logo van de Belgische overheid" />
                    </div>
                    <ul id="blgm_languageSwitch">
                        <?php if(isset($_SESSION['lang'])){
                            $lang = $_SESSION['lang'];
                        }else{
                            $lang ='nl';
                        }?>
                        <li class="blgm_first <?php if($lang=='nl'){echo "blgm_active";}?>">
                            <a href="<?php echo url("/?lang=nl"); ?>" lang="nl" class="blgm_lSwitch" title="Nederlands">nl</a>
                        </li>
                        <li class="<?php if($lang=='fr'){echo "blgm_active";}?>">
                            <a href="<?php echo url("/?lang=fr"); ?>" lang="fr" class="blgm_lSwitch" title="Francais">fr</a>
                        </li>
                        <li class="<?php if($lang=='de'){echo "blgm_active";}?>">
                            <a href="<?php echo url("/?lang=de"); ?>" lang="de" class="blgm_lSwitch" title="Deutsch">de</a>
                        </li>
                        <li class="blgm_last <?php if($lang=='en'){echo "blgm_active";}?>">
                            <a href="<?php echo url("/?lang=en"); ?>" lang="en" class="blgm_lSwitch" title="English">en</a>
                        </li>
                    </ul>
                    <div id="blgm_beLink">
                            <?php echo __("Andere informatie en diensten van de overheid:");?> <a href="http://www.belgium.be/nl/" class="blgm_loglink" title="http://www.belgium.be/nl/">www.belgium.be</a>
                    </div>
                </div>
            </div>
            <div class="siteLabel site">
                <!-- to be placed inside div tag with class="siteLabel" -->
                <div class="siteLogo"> 
                    <a href="http://www.health.belgium.be/eportal/" title="Federale Overheidsdienst Volksgezondheid, Veiligheid van de Voedselketen en Leefmilieu - Home pagina"> 
                    <img title="VDIC - Home pagina" src="<?php echo img('logo.gif'); ?>" /></a> 
                </div>					
            <div class="siteTag" >	
                <img alt="Banner VDIC" src="<?php echo img('vdic_logo.gif'); ?>" />		
            </div>
            
            <div class="meta">
                <div class="navSecond">
                    <?php echo public_nav_main();?>
                    <!--<ul>
                        
                        <li class="First"><span class="page">Over ons</span></li>
			<li class="Active"><a href="#" class="page">Contact</a></li>
			<li><a href="#" class="page">Sitemap</a></li>
			<li class="last"><a href="#" class="page">Partner Bibliotheken</a></li>
                    </ul>-->
                </div>
            </div>
                
            <?php echo search_form(array('submit_value'=>__("Zoek"),'form_attributes'=>array('id'=>'search-form')));?>
            					
            <div class="navMain">					
                <ul>
                    <li class="first">
                        <div align="center">
                            <a href="<?php echo url(libis_get_language_slug()."periodicals")?>" class="page">
                                <span class="navWrap">
                                    <span class="navWrap2"><?php echo __("Tijdschriften"); ?></span>
                                </span>
                            </a>
                        </div>
                    </li>
                    <li>
	       		<a href="<?php echo url(libis_get_language_slug()."databases")?>" class="page">
                            <span class="navWrap">
                                <span class="navWrap2"><?php echo __("Databanken"); ?></span>
                            </span>
                        </a>
                    </li>
                    <li>
	       		<a href="<?php echo url(libis_get_language_slug()."books")?>" class="page">
                            <span class="navWrap">
                                <span class="navWrap2"><?php echo __("Boeken"); ?></span>
                            </span>
                        </a>
                    </li>
                    <li>
	       		<a href="<?php echo url(libis_get_language_slug()."publications")?>" class="page">
                            <span class="navWrap">
                                <span class="navWrap2"><?php echo __("Publicaties"); ?></span>
                            </span>
                        </a>	
                    </li>
                </ul>
            </div>