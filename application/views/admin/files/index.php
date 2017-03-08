<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>{{"menu_files" | translate}}</h1>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                    <div id="uploader">
                        <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                    </div>
                        </div>
                    </div>
                </section>
            </div>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(document).ready(function() {
        $("#uploader").plupload({
        runtimes : 'html5,flash,silverlight,html4',
        url : "<?php echo base_url('admin/files/do_upload');?>",
        max_file_size : '10mb',
        chunk_size: '1mb',
        resize : {
            width : 200,
            height : 200,
            quality : 90,
            crop: true
        },
        filters : [
            {title : "Excel files", extensions : "xlsx,xls,csv"}
        ],
        prevent_duplicates: true,
        rename: true,
        sortable: true,
        dragdrop: true,
        views: {
            list: true,
            active: 'list'
        },
        flash_swf_url : '<?php echo base_url('assets/plupload/js/Moxie.swf');?>',
        silverlight_xap_url : '<?php echo base_url('assets/plupload/js/Moxie.xap');?>'
    });
});
</script>