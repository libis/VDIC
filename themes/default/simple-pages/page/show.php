<?php echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
)); ?>
<div class="breadcrumb">
    <div class="wrapper">
        <div class="breadIndicator"> U bevindt zich hier: </div>
        <?php echo simple_pages_display_breadcrumbs(null," / ");?>              
    </div>
</div>
</div>
<div id="content">
    <div class="gridThree">
        <div class="wrapper2">
            <div class="wrapper clearfix">
                <div class="wrapperIn">
                    <div class="content">
                        <h1 class="heading "><span><?php echo metadata('simple_pages_page', 'title'); ?></span></h1>
                        <div class="textblock">
                        <?php
                            $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                            if (metadata('simple_pages_page', 'use_tiny_mce')) {
                                echo $text;
                            } else {
                                echo eval('?>' . $text);
                            }
                        ?>
                        </div>
                        
                <div class="navAction">
                    <div class="label"><?php echo __("Deze pagina: ")?></div>
                    <ul>
                        <li class="first"><a href="#" onClick="window.print()" class="page print"><?php echo __("printen")?></a></li>
                        <li><a class="addthis_button page share" " href="http://www.addthis.com/bookmark.php"><?php echo __("delen")?></a></li>
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
               
                <?php 
                    if(get_current_record('simple_pages_page', false)->parent_id == 0){
                        $parent = get_current_record('simple_pages_page', false)->id;
                    }else{
                        $parent = get_current_record('simple_pages_page', false)->parent_id;
                    }
                    $html = nav(simple_pages_get_links_for_children_pages($parent));

                    if($html->render() != ""){
                        echo "<div class='contextBlock'><div class='section first'>";
                        echo '<h2 class="heading "><span>'.__("Meer Info").'</span></h2>';
                        echo $html;
                        echo "</div></div>";
                    }
                ?>
                                          
                    
	    </div>
        </div>
        <div class="navigation simple">
         
    </div>
</div>
</div>
</div>
</div>
<script>
    //get first image of page and paste in .navigation
    jQuery('document').ready(function(){
        img = jQuery('.textblock img:first-child');
        img.remove();
        jQuery('.simple').append(img);        
    });
</script>
<?php echo foot(); ?>
