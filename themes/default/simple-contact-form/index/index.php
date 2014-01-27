<?php echo head(); ?>
<div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page"><a href="<?php echo url("");?>">Home</a></span></li> /
                <li class="last"><span class="page"><?php echo __("Contact");?></span></li>
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
                        <h1 class="heading "><span><?php echo __("Contact");?></span></h1>
                        <div class="textblock">
                            <div id="simple-contact">
                                <div id="form-instructions">
                                   
                                    <table class='bib-info'>
                                        <tr><td><?php echo __("Adres: ");?></td><td>Vesalius Documentation and Information Center (VDIC)
                                                <br>Victor Hortaplein/Place Victor Horta 40/10
                                                <br>1060 Brussel / Bruxelles
                                            </td></tr>
                                        <tr><td><?php echo __("Tel: ");?></td><td>+32 (0)2 524 93 55 (Bernadette Claus), +32 (0)2 524 98 41 (Kristof Eelen)</td></tr>
                                        <tr><td><?php echo __("E-mail: ");?></td><td><a href="mailto:biblio@health.belgium.be">biblio@health.belgium.be</a></td></tr>
                                        <tr><td colspan="2"><a href="http://www.health.belgium.be/eportal/Aboutus/ourorganisation/HowtogettotheFPS/index.htm?fodnlang=<?php echo Libis_get_language();?>"><?php echo __("Toegangsplan FOD VVVL");?></a></td></tr>
                                    </table>
                                    
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
                                    <br>
                                    <div class="field">
                                        <?php 
                                               
                                                //echo $this->formSelect('email', $email, array('class'=>'textinput'));  ?>
                                       
                                        <?php
                                                if(isset($_GET['subject'])){
                                                    if($_GET['subject']=="IBL"){
                                                        $value = __('IBL aanvraag');
                                                    }
                                                }else{
                                                    $value = "";
                                                }
                                                echo $this->formLabel('onderwerp', __('Onderwerp: '));
                                                echo $this->formText('onderwerp', $value, array('class'=>'textinput')); 
                                        
                                        ?>
                                    </div>
                                    <br>
                                    <div class="field">
                                      <?php 
                                        echo $this->formLabel('message', __('Boodschap: '));
                                        echo $this->formTextarea('message', $message, array('class'=>'textinput', 'cols' => '62', 'rows' => '10')); ?>
                                    </div>    

                                </fieldset>               
                              

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
                            <li class="first"><a href="#" onClick="window.print()" class="page print"><?php echo __("printen")?></a></li>
                            <li><a class="addthis_button page share" href="http://www.addthis.com/bookmark.php"><?php echo __("delen")?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="context">
                    
                    <div class="contextBlock">
                        <div class="section first">
                            <h2 class="heading "><span><?php echo __("Contacteer een partner");?></span></h2>
                            <?php 
                            $lang = libis_get_language();
                            if($lang == 'nl')
                                $html = nav(simple_pages_get_links_for_children_pages(5));
                            if($lang == 'fr')
                                $html = nav(simple_pages_get_links_for_children_pages(106));
                            if($lang == 'de')
                                $html = nav(simple_pages_get_links_for_children_pages(229));
                            if($lang == 'en')
                                $html = nav(simple_pages_get_links_for_children_pages(259));
                            
                            if($html->render() != ""){
                              
                                echo $html;
                              
                            }
                ?>                                                
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
