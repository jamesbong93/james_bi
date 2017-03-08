<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>{{"menu_users_deactivate" | translate}}</h1>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo sprintf('{{"users_deactivate_question" | translate}}', '<span class="label label-primary">'.$firstname.$lastname).'</span>';?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo form_open('admin/users/deactivate/'. $id, array('class' => 'form-horizontal', 'id' => 'form-status_user')); ?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <label class="radio-inline">
                                                    <input type="radio" name="confirm" id="confirm1" value="yes" checked="checked"> {{"actions_yes" | translate}}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="confirm" id="confirm0" value="no"> {{"actions_no" | translate}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <?php echo form_hidden($csrf); ?>
                                                <?php echo form_hidden(array('id'=>$id)); ?>
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => '{{"actions_submit" | translate}}')); ?>
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
