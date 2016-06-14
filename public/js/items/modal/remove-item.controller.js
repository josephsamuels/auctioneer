(function ()
{
    'use strict';

    angular.module('auctioneer.items').controller('RemoveItemController', RemoveItemController);

    RemoveItemController.$inject = ['$uibModalInstance', 'item'];

    function RemoveItemController($uibModalInstance, item)
    {
        var vm = this;

        vm.cancel = cancel;
        vm.ok = ok;

        /**
         * Cancel removing the item.
         */
        function cancel()
        {
            $uibModalInstance.dismiss('cancel');
        }

        /**
         * Continue with item removal.
         */
        function ok()
        {
            $uibModalInstance.close(item);
        }
    }
})();
