<?php
$pageTitle = __('Nieuwsarchief');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>
<div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page"><a href="<?php echo url("");?>">Home</a></span></li> /
                <li class="last"><span class="page"><?php __('Nieuwsarchief');?></span></li>
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
                        <h1 class="heading "><span><?php echo $pageTitle;?> <?php echo __('(%s totaal)', $total_results); ?></span></h1>
                        <div class="textblock">
                            

                            <?php echo item_search_filters(); ?>

                            <?php echo pagination_links(); ?>

                            <?php if ($total_results > 0): ?>

                            <?php
                            //$sortLinks[__('Title')] = 'Dublin Core,Title';
                            //$sortLinks[__('Creator')] = 'Dublin Core,Creator';
                            //$sortLinks[__('Date Added')] = 'added';
                            ?>
                           

                            <?php endif; ?>

                            <?php foreach (loop('items') as $item): ?>
                            <div class="newsitem">
                                <?php if($datum = metadata('item',array('Dublin Core','Date'))){
                                    echo "<span class='date'>".$datum."</span>";
                                }?>
                                <h2 class="heading"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
                                <div class="item-meta">
                                <?php if (metadata('item', 'has thumbnail')): ?>
                                <div class="item-img" align="left">
                                    <?php echo link_to_item(item_image('square_thumbnail')); ?>
                                </div>
                                <?php endif; ?>
                                                           
                                <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                                <div class="item-description">
                                    <?php echo $description; ?>
                                </div>
                                <?php endif; ?>

                                <?php if (metadata('item', 'has tags')): ?>
                                <div class="tags"><p><strong><?php echo __('Trefwoorden'); ?>:</strong>
                                    <?php echo tag_string('items'); ?></p>
                                </div>
                                <?php endif; ?>

                                <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

                                </div><!-- end class="item-meta" -->
                            </div><!-- end class="item hentry" -->
                            <?php endforeach; ?>

                            <?php echo pagination_links(); ?>
                            
                            <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
                            
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
                <ul class="fotolinks">    
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/databases_1.gif")?>" onmouseout="this.src='<?php echo img("header/databases_1.gif")?>'" onmouseover="this.src='<?php echo img("header/databases_2.gif")?>'"></a></li>
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/monographs_1.gif")?>" onmouseout="this.src='<?php echo img("header/monographs_1.gif")?>'" onmouseover="this.src='<?php echo img("header/monographs_2.gif")?>'"></a></li>
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/periodicals_1.gif")?>" onmouseout="this.src='<?php echo img("header/periodicals_1.gif")?>'" onmouseover="this.src='<?php echo img("header/periodicals_2.gif")?>'"></a></li>
                <li><a href="databases.aspx?lang=NL"><img src="<?php echo img("header/publications_1.gif")?>" onmouseout="this.src='<?php echo img("header/publications_1.gif")?>'" onmouseover="this.src='<?php echo img("header/publications_2.gif")?>'"></a></li>
            </ul>
                <div class="contextBlock">
                    <div class="section first">
                        <h2 class="heading"><span class="sort-label"><?php echo __('Sorteer op'); ?></span></h2>
                        <?php echo browse_sort_links($sortLinks); ?>                                       
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