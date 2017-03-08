<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    {{"menu_groups_edit" | translate}}
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{"groups_edit_group" | translate}}</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_group')); ?>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"groups_name" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($group_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                {{"groups_description" | translate}}
                                            </div>
                                            <div class="col-sm-10">
                                                <?php echo form_input($description);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => '{{"actions_submit" | translate}}')); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => '{{"actions_reset" | translate}}')); ?>
                                                    <?php echo anchor('admin/groups', '{{"actions_cancel" | translate}}', array('class' => 'btn btn-default btn-flat')); ?>
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
