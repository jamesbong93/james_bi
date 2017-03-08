(function(angular) {
    'use strict';
    var biApp = angular.module('BiApp', ['jqwidgets', 'pascalprecht.translate']);

    biApp.controller('RootController', ['$scope', '$translate', '$window', '$timeout',
        function ($scope, $translate, $window, $timeout) { 

        $scope.loaded = false;    
        $timeout(function() { $scope.loaded = true; }, 500);


        var $storage = $window.localStorage;
        
        $translate.use($storage.getItem('language'));
        
        $scope.changeLanguage = function (locale) {
            if (locale) {
                $storage.setItem('language', locale);
                return $translate.use(locale);
            }
            $translate.use($storage.getItem('language') || $translate.use('en'));
        };

        

    }])

    
    
})(angular);
