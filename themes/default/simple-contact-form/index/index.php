<?php echo head(); ?>
<div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page"><a href="<?php echo url("");?>">Home</a></span></li> /
                <li class="last"><span class="page">Contact</span></li>
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
                        <h1 class="heading "><span><?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?></span></h1>
                        <div class="textblock">
                            <div id="simple-contact">
                                <div id="form-instructions">
                                    <?php
                                        if(isset($_GET['partner'])){
                                            $info = Libis_partner_info($_GET['partner']);
                                        }else{
                                            $info = Libis_partner_info('WIV');
                                        }    
                                        echo $info['html'];
                                    ?>
                                    
                                    <?php //echo get_option('simple_contact_form_contact_page_instructions'); // HTML ?>
                                </div>
                                <?php echo flash(); ?>
                                <form name="contact_form" id="contact-form"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                    
                                <fieldset>
                                    <div class="field">
                                    <?php 
                                        echo $this->formLabel('name', __('Naam: '));
                                        echo $this->formText('name', $name, array('class'=>'textinput')); ?>
                                    </div>

                                    <div class="field">
                                        <?php 
                                                echo $this->formLabel('email', __('E-mail: '));
                                                echo $this->formText('email', $email, array('class'=>'textinput'));  ?>
                                    </div>
                                    
                                    <div class="field">
                                        <?php 
                                               
                                                //echo $this->formSelect('email', $email, array('class'=>'textinput'));  ?>
                                       
                                        <?php
                                                if(isset($_GET['subject'])){
                                                    if($_GET['subject']=="IBL"){
                                                        $value = __('IBL aanvraag');
                                                    }
                                                }else{
                                                    $value = __('Vraag naar bijkomende informatie');
                                                }
                                                
                                                $title = new Zend_Form_Element_Select('onderwerp');
                                                $title->setLabel(__('Onderwerp'))
                                                        
                                                        ->setValue($value)
                                                        ->setMultiOptions(array(
                                                        __("Vraag naar bijkomende informatie") => __("Vraag naar bijkomende informatie"),
                                                        __("IBL aanvraag") => __("IBL aanvraag")
                                                        ))
                                                ->setRequired(true)->addValidator('NotEmpty', true);
                                            echo "<p>".$title."</p>";
                                        ?>
                                    </div>

                                    <div class="field">
                                      <?php 
                                        echo $this->formLabel('message', __('Boodschap: '));
                                        echo $this->formTextarea('message', $message, array('class'=>'textinput', 'cols' => '62', 'rows' => '10')); ?>
                                    </div>    

                                </fieldset>
                                    
                                <input type="hidden" name="email_to" value="<?php echo $info["email"];?>">

                                <fieldset>
                                    <?php if ($captcha): ?>
                                    <div class="field">
                                        <?php echo $captcha; ?>
                                    </div>
                                    <?php endif; ?>

                                        <div class="field">
                                          <?php echo $this->formSubmit('send', __('Verstuur')); ?>
                                        </div>

                                </fieldset>
                                </form>
                            </div>
                        
                             
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
