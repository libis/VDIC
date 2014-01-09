<?php echo head(); ?>
<div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page"><a href="<?php echo url("");?>">Home</a></span></li> /
                <li class="last"><span class="page"><?php echo __('Aanvraagformulier tijdschrift')?></span></li>
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
                        <h1 class="heading "><span><?php echo __('Aanvraagformulier tijdschrift')?></span></h1>
                        <div class="textblock">

<div id="simple-contact">
	<div id="form-instructions">
		<p><?php echo __('Velden met * zijn verplicht in the vullen'); // HTML ?></p>
	</div>
	<?php echo flash(); ?>
	<form name="contact_form" id="contact-form"  method="post" accept-charset="utf-8">
        
        <fieldset>
            <h4><?php echo __('Welk tijdschrift?');?></h4>
            <div class="field">
                    <?php 
                        echo $this->formLabel('titel_tijdschrift', __('Titel tijdschrift*:'));
                        echo $this->formText('titel_tijdschrift', $titel_tijdschrift, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('uitgever', __('Uitgever*:'));
                        echo $this->formText('uitgever', $uitgever, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('issn', __('ISSN?:'));
                        echo $this->formText('issn', $issn, array('class'=>'textinput')); ?>
            </div>
            
            <h4><?php echo __('Welk artikel?');?></h4>
            
             <div class="field">
                    <?php 
                        echo $this->formLabel('titel_artikel', __('Titel artikel*:'));
                        echo $this->formText('titel_artikel', $titel_artikel, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('auteur', __('Auteur:'));
                        echo $this->formText('auteur', $auteur, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('jaar', __('Jaar*:'));
                        echo $this->formText('jaar', $jaar, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('volume', __('Volume*:'));
                        echo $this->formText('volume', $volume, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('nummer', __('Tijdschriftnummer:'));
                        echo $this->formText('nummer', $nummer, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('pagina', __('Pagina*:'));
                        echo $this->formText('pagina', $pagina, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php 
                        echo $this->formLabel('commentaar', __('Commentaar:'));
                        echo $this->formText('commentaar', $commentaar, array('class'=>'textinput')); ?>
            </div>
            
            <h4><?php echo __('Wie bent u?');?></h4>
            
            <div class="field">
                    <?php 
                        echo $this->formLabel('voornaam', __('Voornaam*:'));
                        echo $this->formText('voornaam', $voornaam, array('class'=>'textinput')); ?>
            </div>
            <div class="field">
                    <?php 
                        echo $this->formLabel('familienaam', __('Familienaam*:'));
                        echo $this->formText('familienaam', $familienaam, array('class'=>'textinput')); ?>
            </div>           
            <div class="field">
                <?php 
                echo $this->formLabel('email', __('E-mail*:'));
                        echo $this->formText('email', $email, array('class'=>'textinput'));  ?>
            </div>
            <div class="field">
                    <?php 
                        echo $this->formLabel('instelling', __('Instelling*:'));
                        echo $this->formText('instelling', $instelling, array('class'=>'textinput')); ?>
            </div>
            <div class="field">
                    <?php 
                        echo $this->formLabel('dienst', __('Dienst*:'));
                        echo $this->formText('dienst', $dienst, array('class'=>'textinput')); ?>
            </div>
           
        </fieldset>

        <fieldset>
		    
            <div class="field">
              <?php echo $captcha; ?>
            </div>		

            <div class="field">
              <?php echo $this->formSubmit('send', __('Aanvragen')); ?>
            </div>

        </fieldset>
	</form>
        <p><b>(?)</b>
        <?php 
            echo __('Het International Serials Standard Number (ISSN) is een uniek identificatienummer voor periodieke
        publicaties. Een ISSN bestaat uit twee groepen van vier cijfers, gescheiden door een liggend streepje.');
            echo __('Het laatste cijfer, een controlecijfer, kan ook een "X" zijn. U kunt een ISSN meestal snel vinden door in Google de volledige naam van het tijdschrift, gevolgd door "issn" in te tikken (bijv. "environmental health perspectives issn").');
        ?> 
        </p>
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
