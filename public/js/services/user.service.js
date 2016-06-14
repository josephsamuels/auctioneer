(function ()
{
    'use strict';

    angular.module('auctioneer').factory('userService', userService);

    userService.$inject = ['$http'];

    function userService ($http)
    {
        var service = {};

        service.addUser = addUser;
        service.getUsers = getUsers;

        return service;

        /**
         * Add a new user to the database.
         *
         * @param {Object} user The user to add.
         *
         * @returns {*}
         */
        function addUser (user)
        {
            return $http.post('api/v1/user', user).then(function (response)
            {
                return response.data;
            });
        }

        /**
         * Get all users from the API.
         *
         * @returns {*}
         */
        function getUsers ()
        {
            return $http.get('api/v1/users').then(function (response)
            {
                return response.data;
            });
        }
    }
})();
