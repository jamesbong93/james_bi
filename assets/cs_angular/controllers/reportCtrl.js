(function(angular) {
 'use strict';

 angular.module('BiApp').controller('ReportController', ['$scope', '$translate', '$window',
    function($scope, $translate, $window) {

    var grid;
    var source = {

    dataType: "json",
    url: "report/getUsers",
    dataFields: [{
        name: 'fusercode', type: 'string'
        }, {
        name: 'fregistedtime', type: 'datetime'
        }, {
        name: 'femail', type: 'string'
        }],

    root: 'Rows',
    autoheight: true,
    virtualmode: true,

    formatData: function(data) {
        data.filterChanged = false;
        if (data.filterslength) {
            data.filterChanged = true;
            var filterParam = "";
            var filterData = [];
            for (var i = 0; i < data.filterslength; i++) {
                // filter's value.
                var filterValue = data["filtervalue" + i];
                // filter's condition. For the filterMode="simple" it is "CONTAINS".
                var filterCondition = data["filtercondition" + i];
                // filter's data field - the filter column's datafield value.
                var filterDataField = data["filterdatafield" + i];
                // "and" or "or" depending on the filter expressions. When the filterMode="simple", the value is "or".
                var filterOperator = data[filterDataField + "operator"];
                var startIndex = 0; 
                if (filterValue.indexOf('-') == -1) {
                    if (filterCondition == "CONTAINS") {
                        filterParam += "substringof('" + filterValue + "', " + filterDataField + ") eq true";
                        filterParam += " " + filterOperator + " ";
                    }
                }
                // else {
                //     if (filterDataField == "fregistedtime") {
                //         var dateGroups = new Array();
                //         var startIndex = 0;
                //         var item = filterValue.substring(startIndex).indexOf('-');
                //             while (item > -1) {
                //                 dateGroups.push(filterValue.substring(startIndex, item + startIndex));
                //                 startIndex += item + 1;
                //                 item = filterValue.substring(startIndex).indexOf('-');
                //                 if (item == -1) {
                //                         dateGroups.push(filterValue.substring(startIndex));
                //                 }
                //             }
                //             if (dateGroups.length == 3) {
                //                 filterParam += "year(fregistedtime) eq " + parseInt(dateGroups[0]) + " and month(fregistedtime) eq " + parseInt(dateGroups[1]) + " and day(fregistedtime) eq " + parseInt(dateGroups[2]);
                //             }
                //                 filterParam += " " + filterOperator + " ";
                //     }
                // }
               
                filterData.push({ dataField: filterDataField, dataValue: filterValue });

                // remove last filter operator.
                filterParam = filterParam.substring(0, filterParam.length - filterOperator.length - 2);
                data.$filter = filterParam;
                data.filterData = filterData;
                data.filterCondition = filterCondition;
                data.filterOperator = filterOperator;
                data.filterParam = filterParam;
            }  

        }
        
        // data.pagenum - page number starting from 0.
        // data.pagesize - page size
        data.$skip = data.pagenum * data.pagesize;
        data.$top = data.pagesize;
        return data;
        },

    rendergridrows: function() {
        return source.totalrecords;
    },

    beforeprocessing: function(data) {
        source.totalrecords = data[0].TotalRows;
    },
   
    };

    var dataadapter = new $.jqx.dataAdapter(source);

    $scope.gridSettings = {
        created: function(args) {
            grid = args.instance;
        },
        source: dataadapter,
        theme: 'ui-redmond',
        width: '98%',
        serverProcessing: true,
        sortable: true,
        pageable: true,
        pagerMode: 'advanced',
        pageSizeOptions: ['10', '20', '30', '100'],
        pagerPosition: 'both',
        filterable: true,
        filterMode: 'advanced',
        editable: true,
        columns: [{
            text: 'Fusercode', 
            editable: false,
            datafield: 'fusercode'
        }, {
            text: 'fregistedtime',
            editable: false,
            datafield: 'fregistedtime',
            filtertype: 'range'
        }, {
            text: 'femail',
            editable: false,
            datafield: 'femail',
            filtertype: 'range'
        }]

    };

    $scope.csvExportClick = function() { 
        grid.exportData('csv');
    };
    $scope.excelExportClick = function() {
        grid.exportData('xls');
    };
    $scope.pdfExportClick = function() {
        grid.exportData('pdf');
    };
        // console.log($scope.gridSettings);
    }
    
    ]);

})(angular);