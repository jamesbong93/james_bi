<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>{{"menu_users" | translate}}</h1>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                     <h3 class="box-title"><?php echo anchor('admin/users/create', '<i class="fa fa-plus"></i>&nbsp{{"users_create_user" | translate}}', array('class' => 'btn btn-block btn-primary btn-flat')); ?>
                                        
                                    </h3> 
                                    
                                </div>
                                <div class="box-body">
                                    <table class="table  table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{"users_firstname" | translate}}</th>
                                                <th>{{"users_lastname" | translate}}</th>
                                                <th>{{"users_email" | translate}}</th>
                                                <th>{{"users_groups" | translate}}</th>
                                                <th>{{"users_status" | translate}}</th>
                                                <th>{{"users_action" | translate}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($users as $user):?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
<?php foreach ($user->groups as $group):?>
                                                    <?php echo anchor('admin/groups/edit/'.$group->id, '<span class="label" style="background:'.$group->bgcolor.';">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>'); ?>
<?php endforeach?>
                                                </td>
                                                <td><?php echo ($user->active) ? anchor('admin/users/deactivate/'.$user->id, '<span class="label label-success">{{"users_active" | translate}}</span>') : anchor('admin/users/activate/'. $user->id, '<span class="label label-default">{{"users_inactive" | translate}}</span>'); ?></td>
                                                <td>
                                                    <?php echo anchor('admin/users/edit/'.$user->id, '<span class="label label-info">'.'<i class="fa fa-edit"></i>'); ?>
                                                    <?php echo "&nbsp";?>
                                                    <?php echo anchor('admin/users/profile/'.$user->id, '<span class="label label-default">'.'<i class="fa fa-eye"></i>'); ?>
                                                    <?php echo "&nbsp";?>
                                                </td>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
