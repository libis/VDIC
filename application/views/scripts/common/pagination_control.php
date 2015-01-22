<?php
if ($this->pageCount > 1):
    $getParams = $_GET;
?>

<div class="pagination">
    <?php if (isset($this->previous)): ?>
    <!-- Previous page link --> 
   
        <?php $getParams['page'] = $previous; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('&lt;'); ?></a>
   
    <?php endif; ?>
    
   
    <form action="<?php echo html_escape($this->url()); ?>" method="get" accept-charset="utf-8">
    <?php
    $hiddenParams = array();
    $entries = explode('&', http_build_query($getParams));
    foreach ($entries as $entry) {
        if(!$entry) {
            continue;
        }
        list($key, $value) = explode('=', $entry);
        $hiddenParams[urldecode($key)] = urldecode($value);
    }

    foreach($hiddenParams as $key => $value) {
        if($key != 'page') {
            echo $this->formHidden($key,$value);
        }
    }
    ?>
    <?php echo __('%s of %s', $this->formText('page', $this->current,array('size'=>'10')), $this->last); ?>
    </form>
  
    
    <?php if (isset($this->next)): ?> 
    <!-- Next page link -->
   
        <?php $getParams['page'] = $next; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('&gt;'); ?></a>
    <?php endif; ?>
</div>

<?php endif; ?>
