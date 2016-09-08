@extends('masters.app')

@section('content')
    <div ng-controller="ItemsController as vm">
        <div class="col-xs-12 p-y-2">
            <div class="col-lg-8 col-lg-offset-2">
                <div class=" pull-xs-right">
                    <a href="/csv" class="btn btn-primary"><span class="octicon octicon-link-external"></span> Export</a>
                    <a href="/print" class="btn btn-primary"><span class="octicon octicon-file-text"></span> Print</a>
                    @if(in_array('can_create_items', Auth::user()->getPermissions()))
                        <button type="button" class="btn btn-primary" ng-click="vm.addItem()">
                            <span class="octicon octicon-plus"></span> Add Item
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <table class="table table-hover" style="border: 1px solid #eceeef; margin-bottom: 0;">
                    <thead>
                    <th>#</th>
                    <th>Short Description</th>
                    <th>Source</th>
                    <th>Appx. Value</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <tr ng-show="vm.items.length <= 0">
                        <td colspan="5" class="text-xs-center">
                            Add some items to get started!
                        </td>
                    </tr>
                    <tr ng-repeat="item in vm.items | orderBy:'-id'">
                        <th scope="row">[{[ item.id ]}]</th>
                        <td>[{[ item.short_description ]}]</td>
                        <td>[{[ item.source ]}]</td>
                        <td style="width: 120px;">[{[ item.approximate_value | currency:"$" ]}]</td>
                        <td class="text-xs-right" style="width: 120px;">
                            @if(in_array('can_edit_items', Auth::user()->getPermissions()))
                                <button type="button" class="btn btn-secondary btn-sm" ng-click="vm.editItem(item)">
                                    <span class="octicon octicon-pencil"></span>
                                </button>
                            @endif
                            @if(in_array('can_delete_items', Auth::user()->getPermissions()))
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#removeModal" ng-click="vm.removeItem(item)">
                                    <span class="octicon octicon-remove-close"></span>
                                </button>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="splash-screen" ng-hide="vm.loaded"></div>
    </div>

    <script type="text/ng-template" id="removeItemModal">
        <div class="modal-header">
            <h3 class="modal-title">Remove Item</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to remove the selected item?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="vm.ok()">OK</button>
            <button class="btn btn-warning" type="button" ng-click="vm.cancel()">Cancel</button>
        </div>
    </script>

    <script type="text/ng-template" id="editItemModal">
        <div class="modal-header">
            <h3 class="modal-title">
                [{[ (vm.item.id) ? "Edit Item" : "Add Item" ]}]
            </h3>
        </div>
        <div class="modal-body">
            <form name="itemEditForm" method="POST" action="item">
                <fieldset class="form-group row"
                          ng-class="{ 'has-danger': itemEditForm.short_description.$invalid }">
                    <label class="col-sm-3 form-control-label">Short Description</label>
                    <div class="col-sm-9">
                        <input name="short_description" type="text" class="form-control" required
                               placeholder="Short Description" ng-model="vm.item.short_description"/>
                    </div>
                </fieldset>
                <fieldset class="form-group row"
                          ng-class="{ 'has-danger': itemEditForm.full_description.$invalid }">
                    <label class="col-sm-3 form-control-label">Full Description</label>
                    <div class="col-sm-9">
                                <textarea name="full_description" class="form-control" placeholder="Full Description"
                                          ng-model="vm.item.full_description" required maxlength="255"
                                          rows="5"></textarea>
                    </div>
                </fieldset>
                <fieldset class="form-group row"
                          ng-class="{ 'has-danger': itemEditForm.approximate_value.$invalid }">
                    <label class="col-sm-3 form-control-label">Approximate Value</label>
                    <div class="col-sm-9">
                        <input name="approximate_value" type="text" class="form-control" required
                               placeholder="Approximate Value" ng-model="vm.item.approximate_value"
                               ng-pattern="/^[1-9]\d*(\.\d+)?$/"/>
                    </div>
                </fieldset>
                <fieldset class="form-group row"
                          ng-class="{ 'has-danger': itemEditForm.source.$invalid }">
                    <label class="col-sm-3 form-control-label">Source</label>
                    <div class="col-sm-9">
                        <input name="source" type="text" class="form-control" placeholder="Source" required
                               ng-model="vm.item.source"/>
                    </div>
                </fieldset>
                <fieldset class="form-group row">
                    <label class="col-sm-3 form-control-label">Keywords</label>
                    <div class="col-sm-9">
                        <input name="keywords" type="text" class="form-control" placeholder="Keywords"
                               ng-model="vm.item.keywords"/>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" ng-click="vm.cancel()">Cancel</button>
            <button type="button" class="btn btn-primary" ng-click="vm.save()" ng-disabled="itemEditForm.$invalid">
                [{[ (vm.item.id) ? "Save Item" : "Add Item" ]}]
            </button>
        </div>
    </script>
@endsection
