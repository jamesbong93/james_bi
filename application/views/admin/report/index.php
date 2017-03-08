<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style type="text/css">
    .content{
        margin-left: 15px;
    }

</style>

    <div>
        <div class="content-wrapper" ng-controller="ReportController">
            <section class="content-header">
                <h1>{{"menu_report" | translate}}</h1>
                <?php echo $breadcrumb; ?>
            </section>
                
            <section class="content">
                <div class="row">
                <div class="table-responsive">
                    <jqx-data-table jqx-settings="gridSettings"></jqx-data-table>
                </div>
                <div style='margin-top: 20px;'>
                    <div style='float: left;'>
                        <div style='margin-left: 10px; float: left;'>
                            <jqx-button jqx-on-click="csvExportClick()">Export to CSV</jqx-button>
                        </div>
                        <div style='margin-left: 10px; float: left;'>
                            <jqx-button jqx-on-click="excelExportClick()">Export to Excel</jqx-button>
                        </div>
                        <div style='margin-left: 10px; float: left;'>
                            <jqx-button jqx-on-click="pdfExportClick()">Export to PDF</jqx-button>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </div>
    </div>

    


             