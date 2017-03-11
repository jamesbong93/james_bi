<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style type="text/css">
    .login-box-body, .register-box-body
    {
        border-radius: 20px;
    }
</style>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $goolgeReclang; ?>"></script>

            

            <div class="login-box-body">
            <div class="text-center">
                <img src="<?php echo base_url();?>assets/img/tblogo.png">
            </div>
                <p class="login-box-msg"><?php echo lang('auth_sign_session'); ?></p>
                <div style="color:red;">
                    <strong><?php echo $message;?></strong>
                </div>
                
                <?php echo form_open('auth/login');?>
                    <div class="form-group has-feedback">
                        <?php echo form_input($identity);?>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?php echo form_input($password);?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="g-recaptcha" data-sitekey="<?php echo $goolgeRecSiteKey;?>">
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="checkbox icheck">
                                <label>
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                                    &nbsp;
                                    <?php echo lang('auth_remember_me'); ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <?php echo form_submit('submit', lang('auth_login'), array('class' => 'btn btn-primary btn-block', 'id' => 'submitbtn'));?>
                        </div>
                    </div>
                <?php echo form_close();?>

<?php if ($auth_social_network == TRUE): ?>
                <div class="social-auth-links text-center">
                    <p>- <?php echo lang('auth_or'); ?> -</p>
                    <?php echo anchor('#', '<i class="fa fa-facebook"></i>' . lang('auth_sign_facebook'), array('class' => 'btn btn-block btn-social btn-facebook btn-flat')); ?>
                    <?php echo anchor('#', '<i class="fa fa-google-plus"></i>' . lang('auth_sign_google'), array('class' => 'btn btn-block btn-social btn-google btn-flat')); ?>
                </div>
<?php endif; ?>
<?php if ($forgot_password == TRUE): ?>
                <?php echo anchor('#', lang('auth_forgot_password')); ?><br />
<?php endif; ?>
<?php if ($new_membership == TRUE): ?>
                <?php echo anchor('#', lang('auth_new_member')); ?><br />
<?php endif; ?>
            </div>

