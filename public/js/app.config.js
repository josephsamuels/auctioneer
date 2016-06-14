(function ()
{
    'use strict';

    angular.module('auctioneer').config(config);

    config.$inject = ['$interpolateProvider'];

    function config($interpolateProvider)
    {
        $interpolateProvider.startSymbol('[{[');
        $interpolateProvider.endSymbol(']}]');
    }
})();
