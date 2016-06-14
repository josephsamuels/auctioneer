(function ()
{
    'use strict';

    angular.module('auctioneer').factory('itemService', itemService);

    itemService.$inject = ['$http'];

    function itemService ($http)
    {
        var service = {};

        service.addItem = addItem;
        service.getItems = getItems;
        service.removeItem = removeItem;
        service.saveItem = saveItem;

        return service;

        /**
         * Add a new item to the database.
         *
         * @param {object} item The item to add.
         *
         * @returns {*}
         */
        function addItem (item)
        {
            return $http.post('api/v1/item', item).then(function (response)
            {
                return response.data;
            });
        }

        /**
         * Get all items from the API.
         *
         * @returns {*}
         */
        function getItems ()
        {
            return $http.get('api/v1/items').then(function (response)
            {
                return response.data;
            });
        }

        /**
         * Remove an item from the database.
         *
         * @param {Object} item The item to remove.
         *
         * @returns {*}
         */
        function removeItem (item)
        {
            return $http.delete('api/v1/item/' + item.id).then(function (response)
            {
                return response.data;
            });
        }

        /**
         * Save an item to the database.
         *
         * @param {Object} item The item to save.
         *
         * @returns {*}
         */
        function saveItem (item)
        {
            return $http.patch('api/v1/item/' + item.id, item).then(function (response)
            {
                return response.data;
            });
        }
    }
})();
