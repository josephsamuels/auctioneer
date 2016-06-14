(function ()
{
    'use strict';

    angular.module('auctioneer.items').controller('ItemsController', ItemsController);

    ItemsController.$inject = ['$uibModal', 'itemService'];

    function ItemsController ($uibModal, itemService)
    {
        var vm = this;

        vm.items = [];
        vm.loaded = false;

        vm.addItem = addItem;
        vm.editItem = editItem;
        vm.removeItem = removeItem;

        initialize();

        /**
         * Initialize the controller.
         */
        function initialize ()
        {
            itemService.getItems().then(function (items)
                {
                    vm.items = items;
                    vm.loaded = true;
                }
            );
        }

        /**
         * Add an item to the database.
         */
        function addItem ()
        {
            showEditItemModal(new Item()).then(function (item)
            {
                itemService.addItem(item).then(function (item)
                {
                    vm.items.push(item);
                });
            });
        }

        /**
         * Edit the provided item.
         *
         * @param {Object} item The item to edit.
         */
        function editItem (item)
        {
            showEditItemModal(angular.copy(item)).then(function (item)
            {
                itemService.saveItem(item).then(function (response)
                {
                    if (response) {
                        for (var i = 0; i < vm.items.length; i++) {
                            if (vm.items[i].id === item.id) {
                                vm.items[i] = item;
                                return;
                            }
                        }
                    }
                });
            });
        }

        /**
         * Show the modal dialog to edit an item.
         *
         * @param {Item} item The item to edit.
         *
         * @returns {*}
         */
        function showEditItemModal (item)
        {
            var modal_options = {
                animation: true,
                templateUrl: 'editItemModal',
                controller: 'EditItemController',
                controllerAs: 'vm',
                resolve: {
                    item: function ()
                    {
                        return item;
                    }
                }
            };

            var edit_modal = $uibModal.open(modal_options);

            return edit_modal.result;
        }

        /**
         * Remove the provided item from the database.
         *
         * @param {Object} item The item to remove.
         */
        function removeItem (item)
        {
            var modal_options = {
                animation: true,
                templateUrl: 'removeItemModal',
                controller: 'RemoveItemController',
                controllerAs: 'vm',
                resolve: {
                    item: function ()
                    {
                        return item;
                    }
                }
            };

            var remove_modal = $uibModal.open(modal_options);

            remove_modal.result.then(function (item)
            {
                itemService.removeItem(item).then(function (response)
                {
                    if (response) {
                        var index = vm.items.indexOf(item);

                        if (index > -1) {
                            vm.items.splice(index, 1);
                        }
                    }
                });
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
