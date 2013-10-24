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
                        <li class="first"><a href="#" class="page print"><?php echo __("printen")?></a></li>
                        <li><a href="#" class="page share"><?php echo __("delen")?></a></li>
                    </ul>
		</div>
            </div>
            <div class="context">
                <ul class="fotolinks">    
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/databases_1.gif")?>" onmouseout="this.src='<?php echo img("header/databases_1.gif")?>'" onmouseover="this.src='<?php echo img("header/databases_2.gif")?>'"></a></li>
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/monographs_1.gif")?>" onmouseout="this.src='<?php echo img("header/monographs_1.gif")?>'" onmouseover="this.src='<?php echo img("header/monographs_2.gif")?>'"></a></li>
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/periodicals_1.gif")?>" onmouseout="this.src='<?php echo img("header/periodicals_1.gif")?>'" onmouseover="this.src='<?php echo img("header/periodicals_2.gif")?>'"></a></li>
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/publications_1.gif")?>" onmouseout="this.src='<?php echo img("header/publications_1.gif")?>'" onmouseover="this.src='<?php echo img("header/publications_2.gif")?>'"></a></li>
            </ul>
                <div class="contextBlock">
                    <div class="section first">
                        <h2 class="heading "><span><?php echo __("Wegwijs");?></span></h2>
                       
                        <div id="wegwijs"></div>                     
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
