<?php echo head(); ?>
<div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page"><a href="<?php echo url("");?>">Home</a></span></li> /
                <li class="last"><span class="page"><?php echo __("Aanvragen")?></span></li>
            </ol>   
        </div>
    </div>
</div>
</div>
<div id="content">
    <div class="gridThree">
        <div class="wrapper2">
            <div class="wrapper clearfix">
                <div class="wrapperIn">
                    <div class="content">
                        <h1 class="heading "><span><?php echo __("Dank U"); // Not HTML ?></span></h1>
                        <div class="textblock">
                            <?php echo __("We hebben uw aanvraag goed ontvangen en helpen u zo spoedig mogelijk verder.") // HTML ?>
                        </div>
                    
                    
                        
                    <div class="navAction">
                        <div class="label"><?php echo __("Deze pagina: ")?></div>
                        <ul>
                            <li class="first"><a href="#" class="page print"><?php echo __("printen")?></a></li>
                            <li><a href="#" class="page share"><?php echo __("delen")?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="context">
                     <ul class="fotolinks">    
                    <li><a href="<?php echo url(libis_get_language_slug()."databases")?>"><img src="<?php echo img("header/databases_1.gif")?>" onmouseout="this.src='<?php echo img("header/databases_1.gif")?>'" onmouseover="this.src='<?php echo img("header/databases_2.gif")?>'"></a></li>
                    <li><a href="<?php echo url(libis_get_language_slug()."books")?>"><img src="<?php echo img("header/monographs_1.gif")?>" onmouseout="this.src='<?php echo img("header/monographs_1.gif")?>'" onmouseover="this.src='<?php echo img("header/monographs_2.gif")?>'"></a></li>
                    <li><a href="<?php echo url(libis_get_language_slug()."periodicals")?>"><img src="<?php echo img("header/periodicals_1.gif")?>" onmouseout="this.src='<?php echo img("header/periodicals_1.gif")?>'" onmouseover="this.src='<?php echo img("header/periodicals_2.gif")?>'"></a></li>
                    <li><a href="<?php echo url(libis_get_language_slug()."publications")?>"><img src="<?php echo img("header/publications_1.gif")?>" onmouseout="this.src='<?php echo img("header/publications_1.gif")?>'" onmouseover="this.src='<?php echo img("header/publications_2.gif")?>'"></a></li>
                </ul>
                    <div class="contextBlock">
                        <div class="section first">
                            <h2 class="heading "><span><?php echo __("Contacteer een partner");?></span></h2>
                            <?php echo Libis_contact_partners();?>                                                 
                        </div>

                    </div>
                </div>
             </div>
                <div class="navigation simple">
                    <img src="<?php echo img("vesalius_contact.jpg");?>">
                </div>
            </div>
        </div>
    </div>
</div>    
                       
<?php echo foot();