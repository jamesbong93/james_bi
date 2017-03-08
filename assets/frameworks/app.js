(function(angular) {
    'use strict';
    var biApp = angular.module('BiApp', ['jqwidgets', 'pascalprecht.translate']);

    biApp.controller('BiController', [
        '$scope', '$rootScope', '$window', '$translate', '$timeout',
        function($scope, $rootScope, $window, $translate, $timeout) {
        $scope.haha = 'huhu';

    }]);

    biApp.controller("ReportController", ["$scope",
        function ($scope) {  
        var grid;

        $scope.gridSettings =
        {
                created: function(args)
                {
                    grid = args.instance;
                },
                source:   new $.jqx.dataAdapter({
                    dataType: "json",
                    dataFields: [
                        { name: 'username', type: 'string' },
                        { name: 'email', type: 'string' }
                    ],
                    id: 'id',
                    url: "report/getUsers"
                }),

                pageable: true,
                pagerButtonsCount: 10,
                sortable: true,
                pageable: true,
                altRows: true,
                columnsResize: true,
                pageable: true,
                pagerMode: 'advanced',
                filterable: true,
                filterMode: 'advanced',
                height: 500,
                width : '98%',
                theme: 'darkblue',
                columnsReorder: true,
                
                columns: [
                  { text: 'Name', dataField: 'username' },
                  { text: 'Email', dataField: 'email'},
                ],
                

        };

	        $scope.csvExportClick = function () {
	                grid.exportData('csv');
	        };
	        $scope.excelExportClick = function () {
	               grid.exportData('xls');
	        };		
	        $scope.pdfExportClick = function () {
	               grid.exportData('pdf');
	        };
	        // console.log($scope.gridSettings);
        }]);

})(angular);
