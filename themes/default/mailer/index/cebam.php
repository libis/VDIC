<?php echo head(); ?>
<div class="breadcrumb">
        <div class="wrapper">
            <div class="breadIndicator"> U bevindt zich hier: </div>
            <ol>
                <li class="first"><span class="page"><a href="<?php echo url("");?>">Home</a></span></li> /
                <li class="last"><span class="page"><?php echo __('Aanvraagformulier boek')?></span></li>
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
                        <h1 class="heading "><span><?php echo __('Aanvraagformulier voor toegangscodes tot CEBAM')?></span></h1>
                        <div class="textblock">

<div id="simple-contact">
	<div id="form-instructions">
		<p><?php echo __('Velden met * zijn verplicht in the vullen'); // HTML ?></p>
	</div>
	<?php echo flash(); ?>
	<form name="contact_form" id="contact-form"  method="post" accept-charset="utf-8">

        <fieldset>
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
                        echo $this->formLabel('rijksregister', __('Rijksregisternummer*:'));
                        echo $this->formText('rijksregister', $rijksregister, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php
                        echo $this->formLabel('riziv', __('RIZIV-nummer:'));
                        echo $this->formText('riziv', $riziv, array('class'=>'textinput')); ?>
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
            <div class="field">
                    <?php
                        echo $this->formLabel('taal', __('Taal*:'));

                        echo $this->formSelect('taal',$taal,array(),
                                            array(
                                                'NL' => 'NL',
                                                'FR' => 'FR',
                                                'DE' => 'DE',
                                                'EN' => 'EN'
                                            )
                                        );?>

            </div>
            <br>
            <div class="field">
              <?php
                $privacy_message = array(
                  'nl' => "Ik heb de <a href='".url("nl/about/privacy")."'>privacyverklaring</a> gelezen en ga ermee akkoord.",
                  'fr' => "J’ai lu la <a href='".url("fr/about/privacy")."'>politique de confidentialité</a> et je suis d’accord.",
                  'de' => "Ich habe die <a href='".url("de/about/privacy")."'>Datenschutzerklärung</a> zur Kenntnis genommen und erkläre mich mit dieser einverstanden.",
                  'en' => "I have read and agree to the <a href='".url("en/about/privacy")."'>privacy policy</a>."
                  );
              ?>
              <input type="checkbox" name="privacy"><?php echo " ".$privacy_message[libis_get_language()]; ?></input>
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
