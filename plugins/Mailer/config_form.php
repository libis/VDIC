<script type="text/javascript">
jQuery(window).load(function() {
    // Initialize and configure TinyMCE.
    tinyMCE.init({
        // Assign TinyMCE a textarea:
        mode : 'specific_textareas',
        // Add plugins:
        plugins: 'media,paste,inlinepopups',
        // Configure theme:
        theme: 'advanced',
        theme_advanced_toolbar_location: 'top',
        theme_advanced_toolbar_align: 'left',
        theme_advanced_buttons3_add : 'pastetext,pasteword,selectall',
        // Allow object embed. Used by media plugin
        // See http://www.tinymce.com/forum/viewtopic.php?id=24539
        media_strict: false,
        // General configuration:
        convert_urls: false,
    });
    // Add or remove TinyMCE control.
    jQuery('#simple-pages-use-tiny-mce').click(function() {
        if (jQuery(this).is(':checked')) {
            tinyMCE.execCommand('mceAddControl', true');
        } else {
            tinyMCE.execCommand('mceRemoveControl', true);
        }
    });
});
</script>

<?php
$reply_from_email = get_option('mailer_reply_from_email');
$forward_to_email = get_option('mailer_forward_to_email');
$add_to_main_navigation = get_option('mailer_add_to_main_navigation');

$view = get_view();
?>

<?php if (!Omeka_Captcha::isConfigured()): ?>
    <p class="alert">You have not entered your <a href="http://recaptcha.net/">reCAPTCHA</a>
        API keys under <a href="<?php echo url('security#recaptcha_public_key'); ?>">security settings</a>. We recommend adding these keys, or the contact form will be vulnerable to spam.</p>
<?php endif; ?>

<div class="field">
    <?php echo $view->formLabel('reply_from_email', 'Reply-From Email'); ?>
    <div class="inputs">
        <?php echo $view->formText('reply_from_email', $reply_from_email, array('class' => 'textinput')); ?>
        <p class="explanation">
            The address that users can reply to. If blank, your users will not
            be sent confirmation emails of their submissions.
        </p>
    </div>
</div>

<div class="field">
    <?php echo $view->formLabel('forward_to_email', 'Forward-To Email'); ?>
    <div class="inputs">
        <?php echo $view->formText('forward_to_email', $forward_to_email, array('class' => 'textinput')); ?>
        <p class="explanation">
            The email address that receives notifications that someone has
            submitted a message through the contact form. If blank, you will not
            be forwarded messages from your users.
        </p>
    </div>
</div> 

<div class="field">
    <?php echo $view->formLabel('add_to_main_navigation', 'Add to Main Navigation'); ?>
    <div class="inputs">
        <?php echo $view->formCheckbox('add_to_main_navigation', $add_to_main_navigation, null, array('1', '0')); ?>
        <p class="explanation">
            If checked, add a link to the contact form to the main site
            navigation.
        </p>
    </div>
</div>