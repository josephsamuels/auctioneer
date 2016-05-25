@extends('masters.app')

@section('content')
    <div ng-controller="ItemsController as vm">
        <div class="row">
            <div style="width: 760px; padding-top: 50px; margin: auto;">
                <div class="card card-inverse">
                    <div class="card-header card-primary">
                        <span ng-hide="vm.item.id">Add Item</span>
                        <span ng-show="vm.item.id">Edit Item</span>
                    </div>
                    <div class="card-block">
                        <form name="itemAddForm" method="POST" action="item">
                            <fieldset class="form-group row"
                                      ng-class="{ 'has-danger': itemAddForm.short_description.$invalid }">
                                <label class="col-sm-3 form-control-label">Short Description</label>
                                <div class="col-sm-9">
                                    <input name="short_description" type="text" class="form-control" required
                                           placeholder="Short Description" ng-model="vm.item.short_description"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row"
                                      ng-class="{ 'has-danger': itemAddForm.full_description.$invalid }">
                                <label class="col-sm-3 form-control-label">Full Description</label>
                                <div class="col-sm-9">
                                <textarea name="full_description" class="form-control" required
                                          placeholder="Full Description" ng-model="vm.item.full_description"
                                ></textarea>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row"
                                      ng-class="{ 'has-danger': itemAddForm.approximate_value.$invalid }">
                                <label class="col-sm-3 form-control-label">Approximate Value</label>
                                <div class="col-sm-9">
                                    <input name="approximate_value" type="text" class="form-control" required
                                           placeholder="Approximate Value" ng-model="vm.item.approximate_value"
                                           ng-pattern="/^[1-9]\d*(\.\d+)?$/"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row"
                                      ng-class="{ 'has-danger': itemAddForm.source.$invalid }">
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
                            <div class="text-xs-right">
                                <button type="button" class="btn btn-danger" ng-click="vm.clearItem()">
                                    Clear Item
                                </button>
                                <button type="button" class="btn btn-primary" ng-click="vm.addItem()"
                                        ng-hide="vm.item.id"
                                        ng-disabled="itemAddForm.$invalid">
                                    Add Item
                                </button>
                                <button type="button" class="btn btn-primary" ng-click="vm.saveItem()"
                                        ng-show="vm.item.id"
                                        ng-disabled="itemAddForm.$invalid">
                                    Save Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div style="width: 760px; padding-top: 50px; margin: auto;">
                <div class="card">
                    <table class="table table-hover" style="margin-bottom: 0;">
                        <thead>
                        <th>#</th>
                        <th>Short Description</th>
                        <th>Source</th>
                        <th>Appx. Value</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in vm.items | orderBy:'-id'">
                            <th scope="row">[{[ item.id ]}]</th>
                            <td>[{[ item.short_description ]}]</td>
                            <td>[{[ item.source ]}]</td>
                            <td style="width: 120px;">[{[ item.approximate_value | currency:"$" ]}]</td>
                            <td class="text-xs-right" style="width: 120px;">
                                <button type="button" class="btn btn-secondary btn-sm" ng-click="vm.editItem(item)">
                                    <span class="octicon octicon-pencil"></span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" ng-click="vm.removeItem(item)">
                                    <span class="octicon octicon-remove-close"></span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
