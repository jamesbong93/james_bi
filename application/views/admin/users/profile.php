<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    {{"menu_users_profile" | translate}}
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{"header_profile" | translate}}</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-hover">
                                        <tbody>
<?php foreach ($user_info as $user):?>
                                            <tr>
                                                <th>{{"users_ip_address" | translate}}</th>
                                                <td><?php echo $user->ip_address; ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_firstname" | translate}}</th>
                                                <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_lastname" | translate}}</th>
                                                <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_username" | translate}}</th>
                                                <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_email" | translate}}</th>
                                                <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_created_on" | translate}}</th>
                                                <td><?php echo date('d-m-Y', $user->created_on); ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_last_login" | translate}}</th>
                                                <td><?php echo ( ! empty($user->last_login)) ? date('d-m-Y', $user->last_login) : NULL; ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_status" | translate}}</th>
                                                <td><?php echo ($user->active) ? '<span class="label label-success">{{"users_active" | translate}}</span>' : '<span class="label label-default">{{"users_active" | translate}}</span>'; ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_company" | translate}}</th>
                                                <td><?php echo htmlspecialchars($user->company, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_phone" | translate}}</th>
                                                <td><?php echo $user->phone; ?></td>
                                            </tr>
                                            <tr>
                                                <th>{{"users_groups" | translate}}</th>
                                                <td>
<?php foreach ($user->groups as $group):?>
                                                    <?php echo '<span class="label" style="background:'.$group->bgcolor.'">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>'; ?>
<?php endforeach?>
                                                </td>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>

                        <!-- <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">xxxx</h3>
                                </div>
                                <div class="box-body">


                                </div>
                            </div>
                        </div> -->
                    </div>
                </section>
            </div>
