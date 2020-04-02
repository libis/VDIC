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
                        <h1 class="heading "><span><?php echo __('Aanvraagformulier boek')?></span></h1>
                        <div class="textblock">

<div id="simple-contact">
	<div id="form-instructions">
		<p><?php echo __('Velden met * zijn verplicht in the vullen'); // HTML ?></p>
	</div>
	<?php echo flash(); ?>
	<form name="contact_form" id="contact-form"  method="post" accept-charset="utf-8">

        <fieldset>
            <h4><?php echo __('Welk boek?');?></h4>
            <div class="field">
                    <?php
                        echo $this->formLabel('titel_boek', __('Titel boek*:'));
                        echo $this->formText('titel_boek', $titel_boek, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php
                        echo $this->formLabel('uitgever', __('Uitgever*:'));
                        echo $this->formText('uitgever', $uitgever, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php
                        echo $this->formLabel('isbn', __('ISBN?:'));
                        echo $this->formText('isbn', $isbn, array('class'=>'textinput')); ?>
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
                        echo $this->formLabel('editie', __('Editie:'));
                        echo $this->formText('editie', $editie, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php
                        echo $this->formLabel('bibliotheek', __('Bibliotheek:'));
                        echo $this->formText('bibliotheek', $bibliotheek, array('class'=>'textinput')); ?>
            </div>
             <div class="field">
                    <?php
                        echo $this->formLabel('plaatsingsnummer', __('Plaatsingsnummer:'));
                        echo $this->formText('plaatsingsnummer', $plaatsingsnummer, array('class'=>'textinput')); ?>
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
                $lang = libis_get_language();
                $instellingen = array(
                    array('name_nl'=>'FOD VVVL','name_fr'=>'SPF SPSCAE','name_de'=>'FÖD VSNU','name_en'=>'FPS HSFCE'),
                    array('name_nl'=>'Sciensano','name_fr'=>'Sciensano','name_de'=>'Sciensano','name_en'=>'Sciensano'),
                    array('name_nl'=>'HGR','name_fr'=>'CSS','name_de'=>'HGR','name_en'=>'SHC'),
                    array('name_nl'=>'BIOETH','name_fr'=>'BIOETH','name_de'=>'BIOETH','name_en'=>'BIOETH'),
                    array('name_nl'=>'FAGG','name_fr'=>'AFMPS','name_de'=>'FAGG-AFMPS','name_en'=>'FADHP'),
                    array('name_nl'=>'FAVV','name_fr'=>'AFSCA','name_de'=>'FASNK','name_en'=>'FASFC'),
                    array('name_nl'=>'KCE','name_fr'=>'KCE','name_de'=>'KCE','name_en'=>'KCE'),
                    array('name_nl'=>'NICC','name_fr'=>'INCC','name_de'=>'NICC-INCC','name_en'=>'NICC'),
                    array('name_nl'=>'VAZG','name_fr'=>'VAZG','name_de'=>'VAZG','name_en'=>'VAZG')
                );
              ?>

              <select name="instelling">
                <?php
                  foreach($instellingen as $instelling):
                    echo "<option value='".$instelling['name_'.$lang]."'>".$instelling['name_'.$lang]."</option>";
                  endforeach;
                ?>
              </select>
            </div>
            <div class="field">
                    <?php
                        echo $this->formLabel('dienst', __('Dienst*:'));
                        echo $this->formText('dienst', $dienst, array('class'=>'textinput')); ?>
            </div><br>
            <div class="field">
              <?php
                $privacy_message = array(
                  'nl' => "Ik heb de <a target='_blank'  href='".url("nl/about/privacy")."'>privacyverklaring</a> gelezen en ga ermee akkoord.",
                  'fr' => "J’ai lu la <a target='_blank' href='".url("fr/about/privacy")."'>politique de confidentialité</a> et je suis d’accord.",
                  'de' => "Ich habe die <a target='_blank' href='".url("de/about/privacy")."'>Datenschutzerklärung</a> zur Kenntnis genommen und erkläre mich mit dieser einverstanden.",
                  'en' => "I have read and agree to the <a target='_blank' href='".url("en/about/privacy")."'>privacy policy</a>."
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
    <p><b>(?)</b>
        <?php
            echo __('Het International Standard Book Number (ISBN) is een uniek identificatienummer voor (een bepaalde uitgave van) een boek. De meest recente ISBN bestaat uit 13 cijfers (...-.-....-....-.). De oudere ISBN bestaan uit 10 (...-...-...-.) of 9 cijfers. U kunt een ISBN meestal snel vinden door in Google de volledige naam van het boek, gevolgd door "isbn" in te tikken (bijv. "how to publish in biomedicine: 500 tips for success isbn").');
        ?>
    </p>
</div>
                        </div>
                    <div class="navAction">
                        <div class="label"><?php echo __("Deze pagina: ")?></div>
                        <ul>
                            <li class="first"><a href="#" onClick="window.print()" class="page print"><?php echo __("printen")?></a></li>
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
