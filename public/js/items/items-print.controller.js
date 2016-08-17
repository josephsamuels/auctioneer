(function ()
{
    'use strict';

    angular.module('auctioneer.items').controller('ItemsPrintController', ItemsPrintController);

    ItemsPrintController.$inject = ['itemService'];

    function ItemsPrintController(itemService)
    {
        var vm = this;

        vm.items = [];
        vm.loaded = false;

        initialize();

        function initialize()
        {
            itemService.getItems().then(
                function (items)
                {
                    vm.items = items;
                    vm.loaded = true;
                }
            );
        }
    }
})();
