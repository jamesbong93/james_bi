<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>{{"footer_version" | translate}}</b> 1.3.0
                </div>
                <strong>{{"footer_copyright" | translate}} &copy; <?php echo date('Y'); ?> <a href="http://almsaeedstudio.com" target="_blank">通博娱乐</a> &amp; <a href="http://tb1133.com/" target="_blank"></a></strong>{{"footer_all_rights_reserved" | translate}}.
            </footer>
    
        <!-- Plupload JS-->
        <script type="text/javascript" src="<?php echo base_url($plugins_dir. '/plupload/js/jquery-ui.min.js');?>" charset="UTF-8"></script>
        <script type="text/javascript" src="http://www.plupload.com/plupload/js/plupload.full.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="http://www.plupload.com/plupload/js/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8"></script>
        <!-- End Plupload-->

        <!-- jqwidgets plugin js -->
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/jqwidgets/jqx-all.js'); ?>"></script>

        <!-- custom angularjs -->
        <script type="text/javascript" src="<?php echo base_url($custom_angular_dir . '/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($custom_angular_dir . '/translation.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($custom_angular_dir . '/controllers/reportCtrl.js'); ?>"></script>
        <!-- custom adminlte js -->
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
        
<?php if ($mobile == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
    </div>
    </body>
</html>