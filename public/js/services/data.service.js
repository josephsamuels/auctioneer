(function ()
{
    'use strict';

    angular.module('auctioneer').factory('dataService', dataService);

    dataService.$inject = ['$http'];

    function dataService ($http)
    {
        var service = {};

        service.addItem = addItem;
        service.getItems = getItems;
        service.removeItem = removeItem;
        service.saveItem = saveItem;

        return service;

        function addItem (item)
        {
            return $http.post('api/v1/item', item).then(function (response)
            {
                return response.data;
            });
        }

        function getItems ()
        {
            return $http.get('api/v1/items').then(function (response)
            {
                return response.data;
            });
        }

        function removeItem (item)
        {
            return $http.delete('api/v1/item/' + item.id).then(function (response)
            {
                return response.data;
            });
        }

        function saveItem (item)
        {
            return $http.patch('api/v1/item/' + item.id, item).then(function (response)
            {
                return response.data;
            });
        }
    }
})();
