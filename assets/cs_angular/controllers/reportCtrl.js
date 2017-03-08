(function(angular) {
    'use strict';
    
    angular.module('BiApp').controller('ReportController', ['$scope', '$translate',
        function ($scope, $translate) {  
        var grid;

        var source = {
            dataType: "json",
            dataFields: [
                { name: 'fusercode', type: 'string' },
                { name: 'flogindate', type: 'string' }
            ],
            url: "report/getUsers",
            sortcolumn: 'fusercode',
            sortdirection: 'asc',
            root: 'Rows',
            autoheight: true,
            
            // virtualmode: true,
            // rendergridrows: function () {
            //    return dataadapter.records;
            // },
            beforeprocessing: function (data) {
                source.totalrecords = data[0].TotalRows;
            },
            updaterow: function (rowid, rowdata, commit) {
                // synchronize with the server - send update command
                var data = "update=true&fusercode=" + rowdata.fusercode;
                $.ajax({
                    dataType: 'json',
                    url: 'report/getUsers',
                    data: data,
                    success: function (data, status, xhr) {
                     // update command is executed.
                    commit(true);
                    },
                    error: function () {
                        commit(false);
                    }
                });
            }
        };

        var dataadapter = new $.jqx.dataAdapter(source);

        $scope.gridSettings = {

                created: function(args)
                {
                    grid = args.instance;
                },

                source: dataadapter,
                serverProcessing: true,
                
                sortable: true,
                pageable: true,
                altRows: true,
                columnsResize: true,
                pageable: true,
                pagerMode: 'advanced',
                filterable: true,
                filterMode: 'advanced',
                width : '98%',
                theme: 'web',
                editable: true,

                columns: [
                      { text: 'Fusercode', editable: false, datafield: 'fusercode'},
                      { text: 'Flogindate', editable: false, datafield: 'flogindate'}
                      
                  ]

        };
	    $scope.csvExportClick = function () {
           grid.exportData('csv');
        };	        
        $scope.excelExportClick = function () {
	       grid.exportData('xls');
	    };		
        $scope.pdfExportClick = function () {
	       grid.exportData('pdf','','',4);
	    };
	        // console.log($scope.gridSettings);
        }]);

})(angular);
