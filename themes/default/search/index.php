<?php
$pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);

$searchRecordTypes = get_search_record_types();
$query = $_GET['query'];
?>
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
                        <h1 class="heading "><span><?php echo __('Zoekresultaten')?> "<?php echo html_escape($query); ?>" <?php echo __('(%s total)', $total_results);?></span></h1>
                        <div class="textblock">
                            <?php if ($total_results): ?>
                            <?php echo pagination_links(); ?>
                            <?php foreach (loop('search_texts') as $searchText): ?>
                            <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                            <?php $searchRecordType = $searchText['record_type']; ?>
                            <div class="search-result <?php echo strtolower($searchRecordType); ?>">
                            <?php if ($searchRecordType == 'Item' && metadata($record, 'item_type_name')): ?>
                            <?php if (metadata($record, 'has_thumbnail')): ?>
                            <?php echo link_to_item(item_image('square_thumbnail', array(), 0, $record), array('class' => 'image'), 'show', $record); ?>
                            <?php endif; ?>
                            <?php elseif ($searchRecordType == 'Exhibit'): ?>
                            <?php
                                                        $exhibitId = $record->id;
                                                        $exhibitItem = get_records('Item', array('exhibit' => $exhibitId, 'random' => true, 'has files' => true), 1);
                                                        $exhibitImage = get_db()->getTable('File')->findWithImages($exhibitItem[0]->id, 0);
                                                        echo link_to($record, 'show', file_image('square_thumbnail', array(), $exhibitImage), array('class' => 'image'));
                                                    ?>
                            <?php endif; ?>
                            <h3><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h3>
                            <?php if ($searchRecordType == 'Item' && $desc = metadata($record, array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
                            <div class="description"><?php echo $desc; ?></div>
                            <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            <?php echo pagination_links(); ?>
                            <?php else: ?>
                            <div id="no-results">
                            <p><?php echo __('Your query returned no results.');?></p>
                            </div>
                            <?php endif; ?>
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
      
</div>
</div>
</div>
</div>


<?php echo foot(); ?>
