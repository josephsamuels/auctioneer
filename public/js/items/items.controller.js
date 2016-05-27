(function ()
{
    'use strict';

    angular.module('auctioneer.items').controller('ItemsController', ItemsController);

    ItemsController.$inject = ['$uibModal', 'dataService'];

    function ItemsController ($uibModal, dataService)
    {
        var vm = this;

        vm.items = [];
        vm.item = new Item();
        vm.loaded = false;

        vm.addItem = addItem;
        vm.clearItem = clearItem;
        vm.editItem = editItem;
        vm.removeItem = removeItem;
        vm.saveItem = saveItem;

        initialize();

        function initialize ()
        {
            dataService.getItems().then(function (items)
                {
                    vm.items = items;
                    vm.loaded = true;
                }
            );
        }

        function addItem ()
        {
            dataService.addItem(vm.item).then(function (item)
                {
                    vm.items.push(item);
                    clearItem();
                }
            );
        }

        function clearItem()
        {
            vm.item = new Item();
        }

        function editItem(item)
        {
            vm.item = angular.copy(item);
        }

        function removeItem(item)
        {
            var removeModal = $uibModal.open({
                animation: true,
                templateUrl: 'removeItemModal',
                controller: 'RemoveItemModalController',
                controllerAs: 'vm',
                resolve: {
                    item: function () {
                        return item;
                    }
                }
            });

            removeModal.result.then(function (item) {
                dataService.removeItem(item).then(function (response) {
                    if (response) {
                        var index = vm.items.indexOf(item);

                        if (index > -1) {
                            vm.items.splice(index, 1);
                        }
                    }
                });
            });
        }

        function saveItem()
        {
            dataService.saveItem(vm.item).then(function (response) {
                if (response) {
                    for (var i = 0; i < vm.items.length; i++) {
                        if (vm.items[i].id === vm.item.id) {
                            vm.items[i] = vm.item;
                            clearItem();
                            return;
                        }
                    }
                }
            });
        }
    }

    /**
     * A new instance of an auction item.
     *
     * @constructor
     */
    function Item ()
    {
        var item = this;

        item.short_description = '';
        item.full_description = '';
        item.approximate_value = '';
        item.source = '';
        item.keywords = '';
    }
})();
