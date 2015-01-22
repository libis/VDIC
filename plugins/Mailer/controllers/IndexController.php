<?php
class Mailer_IndexController extends Omeka_Controller_AbstractActionController
{
	public function periodicalsAction()
	{
            $titel_tijdschrift = isset($_POST['titel_tijdschrift']) ? $_POST['titel_tijdschrift'] : '';
            $uitgever = isset($_POST['uitgever']) ? $_POST['uitgever'] : '';
            $issn = isset($_POST['issn']) ? $_POST['issn'] : '';
            $titel_artikel = isset($_POST['titel_artikel']) ? $_POST['titel_artikel'] : '';
            $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
            $jaar = isset($_POST['jaar']) ? $_POST['jaar'] : '';
            $volume = isset($_POST['volume']) ? $_POST['volume'] : '';
            $nummer = isset($_POST['nummer']) ? $_POST['nummer'] : '';
            $pagina = isset($_POST['pagina']) ? $_POST['pagina'] : '';            
            $commentaar = isset($_POST['commentaar']) ? $_POST['commentaar'] : '';   
            $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : '';   
            $familienaam = isset($_POST['familienaam']) ? $_POST['familienaam'] : '';   
            $email = isset($_POST['email']) ? $_POST['email'] : '';  
            $instelling = isset($_POST['instelling']) ? $_POST['instelling'] : ''; 
            $dienst = isset($_POST['dienst']) ? $_POST['dienst'] : ''; 
              
	    $captchaObj = $this->_setupCaptcha();

	    if ($this->getRequest()->isPost()) {
    		// If the form submission is valid, then send out the email
               
    		if ($this->_validate_periodicals($captchaObj)) {
                    
                    //
	            //$this->_redirect->gotoRoute(array(), 'mailer_thankyou');
                    $mailer = new Mailer();
                    
                    $message = __("Tijdschrift:")." ".$titel_tijdschrift."<br>";
                    $message .= __("Uitgever:")." ".$uitgever."<br>";
                    $message .= __("ISSN:")." ".$issn."<br>";
                    $message .= __("Artikel:")." ".$titel_artikel."<br>";
                    $message .= __("Auteur:")." ".$auteur."<br>";
                    $message .= __("Jaar:")." ".$jaar."<br>";
                    $message .= __("Volume:")." ".$volume."<br>";
                    $message .= __("Nummer:")." ".$nummer."<br>";
                    $message .= __("Pagina:")." ".$pagina."<br>";            
                    $message .= __("Commentaar:")." ".$commentaar."<br><br>";   
                    $message .= __("Naam:")." ".$voornaam." ".$familienaam."<br>";   
                    $message .= __("E-mail:")." ".$email."<br>";  
                    $message .= __("Instelling:")." ".$instelling."<br>"; 
                    $message .= __("Dienst:")." ".$dienst;
                       
                    $this->sendEmailNotification($email,$voornaam.' '.$familienaam, $message,'biblio@wiv-isp.be');               
                    
                    $this->_helper->redirector('thankyou');
    		}
                
	    }

	    // Render the HTML for the captcha itself.
	    // Pass this a blank Zend_View b/c ZF forces it.
		if ($captchaObj) {
		    $captcha = $captchaObj->render(new Zend_View);
		} else {
		    $captcha = '';
		}

		$this->view->assign(compact('titel_tijdschrift','uitgever','issn','titel_artikel',
                        'auteur','jaar','volume', 'nummer','pagina','commentaar','voornaam',
                        'familienaam','email','instelling','dienst','captcha'));
	}
        
        public function booksAction()
	{
            $titel_boek = isset($_POST['titel_boek']) ? $_POST['titel_boek'] : '';
            $uitgever = isset($_POST['uitgever']) ? $_POST['uitgever'] : '';
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : '';
            $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
            $jaar = isset($_POST['jaar']) ? $_POST['jaar'] : '';
            $editie = isset($_POST['editie']) ? $_POST['editie'] : '';
            $bibliotheek = isset($_POST['bibliotheek']) ? $_POST['bibliotheek'] : '';
            $plaatsingsnummer = isset($_POST['plaatsingsnummer']) ? $_POST['plaatsingsnummer'] : '';            
            $commentaar = isset($_POST['commentaar']) ? $_POST['commentaar'] : '';   
            $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : '';   
            $familienaam = isset($_POST['familienaam']) ? $_POST['familienaam'] : '';   
            $email = isset($_POST['email']) ? $_POST['email'] : '';  
            $instelling = isset($_POST['instelling']) ? $_POST['instelling'] : ''; 
            $dienst = isset($_POST['dienst']) ? $_POST['dienst'] : ''; 
              
	    $captchaObj = $this->_setupCaptcha();

	    if ($this->getRequest()->isPost()) {
    		// If the form submission is valid, then send out the email
               
    		if ($this->_validate_books($captchaObj)) {
                    
                    //
	            //$this->_redirect->gotoRoute(array(), 'mailer_thankyou');
                    $mailer = new Mailer();
                    
                    $message = __("Boek:")." ".$titel_boek."<br>";
                    $message .= __("Uitgever:")." ".$uitgever."<br>";
                    $message .= __("ISBN:")." ".$isbn."<br>";
                    $message .= __("Auteur:")." ".$auteur."<br>";
                    $message .= __("Jaar:")." ".$jaar."<br>";
                    $message .= __("Editie:")." ".$editie."<br>";
                    $message .= __("Bibliotheek:")." ".$bibliotheek."<br>";
                    $message .= __("Plaatsingsnummer:")." ".$plaatsingsnummer."<br>";            
                    $message .= __("Commentaar:")." ".$commentaar."<br><br>";   
                    $message .= __("Naam:")." ".$voornaam." ".$familienaam."<br>";   
                    $message .= __("E-mail:")." ".$email."<br>";  
                    $message .= __("Instelling:")." ".$instelling."<br>"; 
                    $message .= __("Dienst:")." ".$dienst;
                       
                    $this->sendEmailNotification($email,$voornaam.' '.$familienaam, $message);               
                    
                    $this->_helper->redirector('thankyou');
    		}
                
	    }

	    // Render the HTML for the captcha itself.
	    // Pass this a blank Zend_View b/c ZF forces it.
		if ($captchaObj) {
		    $captcha = $captchaObj->render(new Zend_View);
		} else {
		    $captcha = '';
		}

		$this->view->assign(compact('titel_boek','uitgever','isbn',
                        'auteur','jaar','editie', 'bibliotheek','plaatsingsnummer','commentaar','voornaam',
                        'familienaam','email','instelling','dienst','captcha'));
	}
        
        public function cebamAction()
	{         
            $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : '';   
            $familienaam = isset($_POST['familienaam']) ? $_POST['familienaam'] : '';   
            $email = isset($_POST['email']) ? $_POST['email'] : '';  
            $instelling = isset($_POST['instelling']) ? $_POST['instelling'] : ''; 
            $dienst = isset($_POST['dienst']) ? $_POST['dienst'] : ''; 
            $taal = isset($_POST['taal']) ? $_POST['taal'] : '';   
            $rijksregister = isset($_POST['rijksregister']) ? $_POST['rijksregister'] : '';   
            $riziv = isset($_POST['riziv']) ? $_POST['riziv'] : '';   
	    $captchaObj = $this->_setupCaptcha();

	    if ($this->getRequest()->isPost()) {
    		// If the form submission is valid, then send out the email
               
    		if ($this->_validate_cebam($captchaObj)) {                    
                    //
	            //$this->_redirect->gotoRoute(array(), 'mailer_thankyou');
                    $mailer = new Mailer();                   
                    $message = "<h2>".__('Aanvraagformulier voor toegangscodes tot CEBAM')."</h2>";
                    $message .= __("Naam:")." ".$voornaam." ".$familienaam."<br>";  
                    $message .= __("Rijksregisternummer:")." ".$rijksregister."<br>";
                    $message .= __("RIZIV-nummer:")." ".$riziv."<br>";
                    $message .= __("E-mail:")." ".$email."<br>";  
                    $message .= __("Instelling:")." ".$instelling."<br>"; 
                    $message .= __("Dienst:")." ".$dienst."<br>";
                    $message .= __("Taal:")." ".$taal."<br>";
                       
                    $this->sendEmailNotification($email,$voornaam.' '.$familienaam, $message);               
                    
                    $this->_helper->redirector('thankyou');
    		}
                
	    }

	    // Render the HTML for the captcha itself.
	    // Pass this a blank Zend_View b/c ZF forces it.
		if ($captchaObj) {
		    $captcha = $captchaObj->render(new Zend_View);
		} else {
		    $captcha = '';
		}

		$this->view->assign(compact('voornaam','familienaam','email','instelling',
                        'dienst','taal','rijksregister','riziv','captcha'));
	}

	public function thankyouAction()
	{

	}

	protected function _validate_periodicals($captcha = null)
	{
	    	$valid = true;
                $titel_tijdschrift = $this->getRequest()->getPost('titel_tijdschrift');
                $uitgever = $this->getRequest()->getPost('uitgever');
                $titel_artikel = $this->getRequest()->getPost('titel_artikel');
                $jaar = $this->getRequest()->getPost('jaar');
                $volume = $this->getRequest()->getPost('volume');
                $pagina = $this->getRequest()->getPost('pagina');
                $voornaam = $this->getRequest()->getPost('voornaam');
                $familienaam = $this->getRequest()->getPost('familienaam');
                $instelling = $this->getRequest()->getPost('instelling');
                $dienst = $this->getRequest()->getPost('dienst');
                $email = $this->getRequest()->getPost('email');
                // ZF ReCaptcha ignores the 1st arg.
                if ($captcha and !$captcha->isValid('foo', $_POST)) {
                            $this->_helper->flashMessenger(__('Je CAPTCHA submissie is niet geldig.'));
                            $valid = false;
                } else if (!Zend_Validate::is($email, 'EmailAddress')) {
                            $this->_helper->flashMessenger(__('Je emailadres is niet geldig.'));
                            $valid = false;
                } else if (empty($titel_tijdschrift)) {
                            $this->_helper->flashMessenger(__('Je moet de titel van het tijdschrift geven.'));
                            $valid = false;
                 } else if (empty($uitgever)) {
                            $this->_helper->flashMessenger(__('Je bent de uitgever vergeten.'));
                            $valid = false;
                } else if (empty($titel_artikel)) {
                            $this->_helper->flashMessenger(__('Je moet de titel van het artikel geven.'));
                            $valid = false;
                 } else if (empty($jaar)) {
                            $this->_helper->flashMessenger(__('Je moet het jaar van uitgave geven.'));
                            $valid = false;
                 } else if (empty($volume)) {
                            $this->_helper->flashMessenger(__('Je moet het volume geven.'));
                            $valid = false;
                } else if (empty($pagina)) {
                            $this->_helper->flashMessenger(__('Je moet de paginas geven.'));
                            $valid = false;
                 } else if (empty($voornaam)) {
                            $this->_helper->flashMessenger(__('Je bent je voornaam vergeten.'));
                            $valid = false;
                 } else if (empty($familienaam)) {
                            $this->_helper->flashMessenger(__('Je bent je familienaam vergeten.'));
                            $valid = false;
                 } else if (empty($instelling)) {
                            $this->_helper->flashMessenger(__('Je bent je instelling vergeten.'));
                            $valid = false;
                 } else if (empty($dienst)) {
                            $this->_helper->flashMessenger(__('Je bent je dienst vergeten.'));
                            $valid = false;
                }

                return $valid;
	}
        
    protected function _validate_books($captcha = null)
    {
            $valid = true;
            $titel_boek = $this->getRequest()->getPost('titel_boek');
            $uitgever = $this->getRequest()->getPost('uitgever');
            $jaar = $this->getRequest()->getPost('jaar');
            $voornaam = $this->getRequest()->getPost('voornaam');
            $familienaam = $this->getRequest()->getPost('familienaam');
            $instelling = $this->getRequest()->getPost('instelling');
            $dienst = $this->getRequest()->getPost('dienst');
            $email = $this->getRequest()->getPost('email');
            // ZF ReCaptcha ignores the 1st arg.
            if ($captcha and !$captcha->isValid('foo', $_POST)) {
                        $this->_helper->flashMessenger(__('Je CAPTCHA submissie is niet geldig.'));
                        $valid = false;
            } else if (!Zend_Validate::is($email, 'EmailAddress')) {
                        $this->_helper->flashMessenger(__('Je emailadres is niet geldig.'));
                        $valid = false;
            } else if (empty($titel_boek)) {
                        $this->_helper->flashMessenger(__('Je moet de titel van het boek geven.'));
                        $valid = false;
            } else if (empty($uitgever)) {
                        $this->_helper->flashMessenger(__('Je bent de uitgever vergeten.'));
                        $valid = false;
            } else if (empty($jaar)) {
                        $this->_helper->flashMessenger(__('Je moet het jaar van uitgave geven.'));
                        $valid = false;
            } else if (empty($voornaam)) {
                        $this->_helper->flashMessenger(__('Je bent je voornaam vergeten.'));
                        $valid = false;
            } else if (empty($familienaam)) {
                        $this->_helper->flashMessenger(__('Je bent je familienaam vergeten.'));
                        $valid = false;
            } else if (empty($instelling)) {
                        $this->_helper->flashMessenger(__('Je bent je instelling vergeten.'));
                        $valid = false;
            } else if (empty($dienst)) {
                        $this->_helper->flashMessenger(__('Je bent je dienst vergeten.'));
                        $valid = false;
            }

            return $valid;
    }
    
    protected function _validate_cebam($captcha = null)
    {
            $valid = true;
            $voornaam = $this->getRequest()->getPost('voornaam');
            $familienaam = $this->getRequest()->getPost('familienaam');
            $instelling = $this->getRequest()->getPost('instelling');
            $dienst = $this->getRequest()->getPost('dienst');
            $email = $this->getRequest()->getPost('email');
            $rijksregister = $this->getRequest()->getPost('rijksregister');
            // ZF ReCaptcha ignores the 1st arg.
            if ($captcha and !$captcha->isValid('foo', $_POST)) {
                        $this->_helper->flashMessenger(__('Je CAPTCHA submissie is niet geldig.'));
                        $valid = false;
            } else if (!Zend_Validate::is($email, 'EmailAddress')) {
                        $this->_helper->flashMessenger(__('Je emailadres is niet geldig.'));
                        $valid = false;           
            } else if (empty($voornaam)) {
                        $this->_helper->flashMessenger(__('Je bent je voornaam vergeten.'));
                        $valid = false;
            } else if (empty($familienaam)) {
                        $this->_helper->flashMessenger(__('Je bent je familienaam vergeten.'));
                        $valid = false;
            } else if (empty($instelling)) {
                        $this->_helper->flashMessenger(__('Je bent je instelling vergeten.'));
                        $valid = false;
            } else if (empty($dienst)) {
                        $this->_helper->flashMessenger(__('Je bent je dienst vergeten.'));
                        $valid = false;
            } else if (empty($rijksregister)) {
                        $this->_helper->flashMessenger(__('Je bent je rijksregisternummer vergeten.'));
                        $valid = false;
            }

            return $valid;
    }

    protected function _setupCaptcha()
    {
        return Omeka_Captcha::getCaptcha();
    }

    protected function sendEmailNotification($formEmail, $formName, $formMessage,$diff_email=null) {

		//setup smtp
		$tr = new Zend_Mail_Transport_Smtp('smtp.kuleuven.be');
		Zend_Mail::setDefaultTransport($tr);
                

        //notify the admin
        //use the admin email specified in the plugin configuration.
        $forwardToEmail = get_option('mailer_forward_to_email');
        
        if($diff_email){
            //$formEmail = $diff_email;
            $forwardToEmail = $diff_email;
        }

        if (!empty($forwardToEmail)) {
            $mail = new Zend_Mail('UTF-8');
            $mail->setBodyHtml(__('Een gebruiker heeft je de volgende boodschap verzonden:') . "<br><br>" . $formMessage);
            $mail->setFrom($formEmail, $formName);
            $mail->addTo($forwardToEmail);
            $mail->setSubject(get_option('site_title') . ' - ' . __("Aanvraag ontvangen"));
            $mail->send();
        }

        //notify the user who sent the message
        $replyToEmail = get_option('mailer_reply_from_email');
        if (!empty($replyToEmail)) {
            $mail = new Zend_Mail('UTF-8');
            $mail->setBodyHtml(__('Dank u, wij hebben de volgende aanvraag van u ontvangen:') . "<br><br>" . $formMessage);
            $mail->setFrom($replyToEmail);
            $mail->addTo($formEmail, $formName);
            $mail->setSubject(get_option('site_title') . ' - ' . __("Aanvraag verzonden"));
            $mail->send();
        }
	}
}
