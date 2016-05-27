(function ()
{
    'use strict';

    angular.module('auctioneer.items').controller('RemoveItemModalController', RemoveItemModalController);

    RemoveItemModalController.$inject = ['$uibModalInstance', 'item'];

    function RemoveItemModalController($uibModalInstance, item)
    {
        var vm = this;

        vm.cancel = cancel;
        vm.ok = ok;

        function cancel()
        {
            $uibModalInstance.dismiss('cancel');
        }

        function ok()
        {
            $uibModalInstance.close(item);
        }
    }
})();
