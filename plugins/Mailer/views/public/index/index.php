<?php echo head(); ?>
<div id="primary">
<p id="simple-pages-breadcrumbs">
	<a href="http://libisplus.be/">Home</a>
	> Registreer
	</p>    
<div id="simple-contact">
	<div id="form-instructions">
		<p><?php echo get_option('mailer_contact_page_instructions'); // HTML ?></p>
	</div>
	<?php echo flash(); ?>
	<form name="contact_form" id="contact-form"  method="post" accept-charset="utf-8">
        
        <fieldset>
            
            <div class="field">
                    <?php 
                        echo $this->formLabel('name', 'Naam: ');
                        echo $this->formText('name', $name, array('class'=>'textinput')); ?>
            </div>
            <div class="field">
                    <?php 
                        echo $this->formLabel('firstname', 'Voornaam: ');
                        echo $this->formText('firstname', $firstname, array('class'=>'textinput')); ?>
            </div>
            <div class="field">
                <?php 
                echo $this->formLabel('email', 'E-mail: ');
                        echo $this->formText('email', $email, array('class'=>'textinput'));  ?>
            </div>
            <div class="field">
                    <?php 
                        echo $this->formLabel('telephone', 'Telefoon: ');
                        echo $this->formText('telephone', $telephone, array('class'=>'textinput')); ?>
            </div>
            <div class="field">
                    <?php 
                        echo $this->formLabel('institution', 'Instelling - Dienst: ');
                        echo $this->formText('institution', $institution, array('class'=>'textinput')); ?>
            </div>
            <div class="field">
                    <?php 
                        //echo $this->formLabel('event', 'Wil je van toekomstige events op hoogte gehouden worden? ');                        
                        echo '<p>Wil je van toekomstige events op hoogte gehouden worden?
                        <input type="checkbox" name="events_notice" value="1"></p>';
                                ?>
            </div>

            <div class="field">
              <?php 
                echo $this->formLabel('extra', 'Extra opmerkingen: ');
                echo $this->formTextarea('extra', $extra, array('class'=>'textinput')); ?>
            </div>    

        </fieldset>

        <fieldset>
		    
            <div class="field">
              <?php echo $captcha; ?>
            </div>		

            <div class="field">
              <?php echo $this->formSubmit('send', 'Registreer'); ?>
            </div>

        </fieldset>
	</form>
</div>

</div>
<?php echo foot(); ?>