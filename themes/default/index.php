<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
    <div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page">Home</span></li>
            </ol>   
        </div>
    </div>
</div>
<div id="content">
    <div class="gridThree">
        <div class="wrapper2">
            <div class="wrapper clearfix">
                <div class="wrapperIn">
                    <div class="content">
                        <h1 class="heading "><span><?php echo __('Nieuws');?></span></h1>
                        <div class="textblock">
                            <?php echo Libis_get_nieuws(10);?>
                        </div>
                        
                <div class="navAction">
                    <div class="label"><?php echo __("Deze pagina: ")?></div>
                   <ul>
                        <li class="first"><a href="#" onClick="window.print()" class="page print"><?php echo __("printen")?></a></li>
                        <li><li><a class="addthis_button page share" " href="http://www.addthis.com/bookmark.php"><?php echo __("delen")?></a></li>
                    </ul>
		</div>
            </div>
            <div class="context">
                
                <div class="contextBlock">
                    <div class="section first">
                        <h2 class="heading "><span><?php echo __("Meer Info");?></span></h2>
                        <ul>
                            <li><a href="<?php echo url(libis_get_language_slug()."manual/periodicals")?>"><?php echo __("Wegwijs")." ".__("Tijdschriften");?></a></li>
                            <li><a href="<?php echo url(libis_get_language_slug()."manual/databases")?>"><?php echo __("Wegwijs")." ".__("Databanken");?></a></li>
                            <li><a href="<?php echo url(libis_get_language_slug()."manual/books")?>"><?php echo __("Wegwijs")." ".__("Boeken");?></a></li>
                        </ul>                  
                    </div>
									
                </div>
	    </div>
        </div>
        <div class="navigation">
            <div class="navSub">
                <div class="subHead">
                    <div class="subHeadWrap"> <span class="back"><?php echo __("Nieuws");?></span>
                        <h2 class="heading "><span><a href="#" class=""><?php echo __("Partners");?></a></span></h2>
                    </div>
                </div>
            <div class="subContent">
                <?php echo Libis_get_nieuws_partners(3); ?>               
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php echo foot(); ?>
