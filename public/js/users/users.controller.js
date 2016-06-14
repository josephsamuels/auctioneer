(function ()
{
    'use strict';

    angular.module('auctioneer.users').controller('UsersController', UsersController);

    UsersController.$inject = ['$uibModal', 'roleService', 'userService'];

    function UsersController ($uibModal, roleService, userService)
    {
        var vm = this;

        vm.roles = [];
        vm.users = [];
        vm.loaded = false;

        vm.addUser = addUser;
        vm.editUser = editUser;

        initialize();

        /**
         * Initialize the controller.
         */
        function initialize ()
        {
            userService.getUsers().then(function (users)
            {
                vm.users = users;
                vm.loaded = true;
            });

            roleService.getRoles().then(function (roles)
            {
                vm.roles = roles;
            });
        }

        /**
         * Add a user to the database.
         */
        function addUser ()
        {
            showEditUserModal(new User()).then(function (user)
            {
                userService.addUser(user).then(function (user)
                {
                    vm.users.push(user);
                });
            });
        }

        /**
         * Edit the provided user.
         *
         * @param {User} user The item to edit.
         */
        function editUser (user)
        {
            showEditUserModal(angular.copy(user)).then(function (user)
            {
                userService.saveUser(user).then(function (response)
                {
                    if (response) {
                        for (var i = 0; i < vm.users.length; i++) {
                            if (vm.users[i].id === user.id) {
                                vm.users[i] = user;
                                return;
                            }
                        }
                    }
                });
            });
        }

        /**
         * Show the modal dialog to edit a user.
         *
         * @param {User} user The item to edit.
         *
         * @returns {*}
         */
        function showEditUserModal (user)
        {
            var modal_options = {
                animation: true,
                templateUrl: 'addUserModal',
                controller: 'EditUserController',
                controllerAs: 'vm',
                resolve: {
                    user: function ()
                    {
                        return user;
                    }
                }
            };

            var edit_modal = $uibModal.open(modal_options);

            return edit_modal.result;
        }
    }

    /**
     * A new instance of a user.
     *
     * @constructor
     */
    function User ()
    {
        var user = this;

        user.name = '';
        user.email = '';
        user.password = '';
        user.role = '';
    }
})();
