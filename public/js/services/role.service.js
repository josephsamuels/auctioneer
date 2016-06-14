(function ()
{
    'use strict';

    angular.module('auctioneer').factory('roleService', roleService);

    roleService.$inject = ['$http'];

    function roleService ($http)
    {
        var service = {};

        service.roles = getRoles();
        service.getRoles = getRoles;

        return service;

        /**
         * Get all roles from the API.
         *
         * @returns {*}
         */
        function getRoles ()
        {
            return $http.get('api/v1/roles').then(function (response)
            {
                return response.data;
            });
        }
    }
})();
