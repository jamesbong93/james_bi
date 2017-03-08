<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style type="text/css">
    .box-title{
        font-weight: bold;
    }
    .control-label{
        font-weight: bold;
    }
</style>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>{{"menu_users_create" | translate}}</h1>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{"users_create_user" | translate}}</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user')); ?>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_firstname" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($first_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_lastname" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($last_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_company" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($company);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_email" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($email);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_phone" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($phone);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_password" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password);?>
                                                <div class="progress" style="margin:0">
                                                    <div class="pwstrength_viewport_progress"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"users_password_confirm" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password_confirm);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => '{{"actions_submit" | translate}}')); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => '{{"actions_reset" | translate}}')); ?>
                                                    <?php echo anchor('admin/users', '{{"actions_cancel" | translate}}', array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
