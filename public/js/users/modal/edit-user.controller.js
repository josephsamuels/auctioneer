(function ()
{
    'use strict';

    angular.module('auctioneer.users').controller('EditUserController', EditUserController);

    EditUserController.$inject = ['$uibModalInstance', 'roleService', 'user'];

    function EditUserController ($uibModalInstance, roleService, user)
    {
        var vm = this;

        vm.user = user;
        vm.roles = [];

        vm.cancel = cancel;
        vm.save = save;

        initialize();

        /**
         * Initialize the controller.
         */
        function initialize ()
        {
            roleService.getRoles().then(function (roles)
            {
                vm.roles = roles;
            });
        }

        /**
         * Cancel creating a user.
         */
        function cancel ()
        {
            $uibModalInstance.dismiss('cancel');
        }

        /**
         * Return the created user.
         */
        function save ()
        {
            $uibModalInstance.close(vm.user);
        }
    }
})();
