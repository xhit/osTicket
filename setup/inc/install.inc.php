<?php
if(!defined('SETUPINC')) die('Kwaheri!');
$info=($_POST && $errors)?Format::htmlchars($_POST):array('prefix'=>'ost_','dbhost'=>'localhost','lang_id'=>'en_US');
?>
<div id="main" class="step2">
    <h1><?php echo __('osTicket Basic Installation'); ?></h1>
        <p><?php echo __('Please fill out the information below to continue your osTicket installation. All fields are required.');?></p>
            <font class="error"><strong><?php echo $errors['err']; ?></strong></font>
            <form action="install.php" method="post" id="install">
                <input type="hidden" name="s" value="install">
                <h4 class="head system"><?php echo __('System Settings');?></h4>
                <span class="subhead"><?php echo __('The URL of your helpdesk, its name, and the default system email address');?></span>
                <div class="row">
                    <label><?php echo __('Helpdesk URL');?>:</label>
                    <span class="ltr"><strong><?php echo URL; ?></strong></span>
                </div>
                <div class="row">
                    <label><?php echo __('Helpdesk Name');?>:</label>
                    <input type="text" name="name" size="45" tabindex="1" value="<?php echo $info['name']; ?>">
                    <a class="tip" href="#helpdesk_name"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['name']; ?></font>
                </div>
                <div class="row">
                    <label><?php echo __('Default Email');?>:</label>
                    <input type="text" name="email" size="45" tabindex="2" value="<?php echo $info['email']; ?>">
                    <a class="tip" href="#system_email"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['email']; ?></font>
                </div>
                <div class="row">
                    <label><?php echo __('Primary Language');?>:</label>
<?php $langs = Internationalization::availableLanguages(); ?>
                <select name="lang_id">
<?php foreach($langs as $l) {
    $selected = ($info['lang_id'] == $l['code']) ? 'selected="selected"' : ''; ?>
                    <option value="<?php echo $l['code']; ?>" <?php echo $selected;
                        ?>><?php echo Internationalization::getLanguageDescription($l['code']); ?></option>
<?php } ?>
                </select>
                <a class="tip" href="#default_lang"><i class="icon-question-sign help-tip"></i></a>
                <font class="error">&nbsp;<?php echo $errors['lang_id']; ?></font>
                </div>

                <h4 class="head admin"><?php echo __('Admin User');?></h4>
                <span class="subhead"><?php echo __('Your primary administrator account - you can add more users later.');?></span>
                <div class="row">
                    <label><?php echo __('First Name');?>:</label>
                    <input type="text" name="fname" size="45" tabindex="3" value="<?php echo $info['fname']; ?>">
                    <a class="tip" href="#first_name"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['fname']; ?></font>
                </div>
                <div class="row">
                    <label><?php echo __('Last Name');?>:</label>
                    <input type="text" name="lname" size="45" tabindex="4" value="<?php echo $info['lname']; ?>">
                    <a class="tip" href="#last_name"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['lname']; ?></font>
                </div>
                <div class="row">
                    <label><?php echo __('Username');?>:</label>
                    <input type="text" name="username" size="45" tabindex="6" value="<?php echo $info['username']; ?>" autocomplete="off">
                    <a class="tip" href="#username"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['username']; ?></font>
                </div>
                <div class="row">
                    <label><?php echo __('Password');?>:</label>
                    <input type="password" name="passwd" size="45" maxlength="128" tabindex="7" value="<?php echo $info['passwd']; ?>" autocomplete="off">
                    <a class="tip" href="#password"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['passwd']; ?></font>
                </div>
                <div class="row">
                    <label><?php echo __('Retype Password');?>:</label>
                    <input type="password" name="passwd2" size="45" maxlength="128" tabindex="8" value="<?php echo $info['passwd2']; ?>">
                    <a class="tip" href="#password2"><i class="icon-question-sign help-tip"></i></a>
                    <font class="error"><?php echo $errors['passwd2']; ?></font>
                </div>

                <br>
                <div id="bar">
                    <input class="btn" type="submit" value="<?php echo __('Install Now');?>" tabindex="14">
                </div>

                <input type="hidden" name="timezone" id="timezone"/>
            </form>
    </div>
    <div>
        <p><strong><?php echo __('Need Help?');?></strong> <?php echo __('We provide <u>professional installation services</u> and commercial support.');?> <a target="_blank" href="https://osticket.com/support"><?php echo __('Learn More!');?></a></p>
    </div>
    <div id="overlay"></div>
    <div id="loading">
        <h4><?php echo __('Doing stuff!');?></h4>
        <?php echo __('Please wait... while we install your new support ticket system!');?>
    </div>
