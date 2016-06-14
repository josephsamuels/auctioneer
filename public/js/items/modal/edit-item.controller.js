(function ()
{
    'use strict';

    angular.module('auctioneer.items').controller('EditItemController', EditItemController);

    EditItemController.$inject = ['$uibModalInstance', 'item'];

    function EditItemController ($uibModalInstance, item)
    {
        var vm = this;

        vm.item = item;

        vm.cancel = cancel;
        vm.save = save;

        /**
         * Cancel editing the item.
         */
        function cancel ()
        {
            $uibModalInstance.dismiss('cancel');
        }

        /**
         * Return the updated item.
         */
        function save ()
        {
            $uibModalInstance.close(vm.item);
        }
    }
})();
