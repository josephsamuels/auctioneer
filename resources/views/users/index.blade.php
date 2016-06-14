@extends('masters.app')

@section('content')
    <div ng-controller="UsersController as vm">
        <div class="row p-y-2">
            <div class="col-xs-6 col-xs-offset-3">
                @if(in_array('can_create_users', Auth::user()->getPermissions()))
                    <button type="button" class="btn btn-primary pull-xs-right" ng-click="vm.addUser()">
                        <span class="octicon octicon-plus"></span> Add User
                    </button>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="card">
                    <table class="table table-hover" style="margin-bottom: 0;">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr ng-show="vm.users.length <= 0">
                            <td colspan="5" class="text-xs-center">
                                No users available. I'm not sure how you're seeing this.
                            </td>
                        </tr>
                        <tr ng-repeat="user in vm.users | orderBy:'name'">
                            <th scope="row">[{[ user.name ]}]</th>
                            <td>
                                <a href="mailto: [{[ user.email ]}]">[{[ user.email ]}]</a>
                            </td>
                            <td>[{[ vm.roles[user.role].name ]}]</td>
                            <td class="text-xs-right" style="width: 120px;">
                                @if(in_array('can_edit_users', Auth::user()->getPermissions()))
                                    <button type="button" class="btn btn-secondary btn-sm" ng-click="vm.editUser(user)"
                                            ng-if="user.role !== 'administrator'">
                                        <span class="octicon octicon-pencil"></span>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="splash-screen" ng-hide="vm.loaded"></div>

        <script type="text/ng-template" id="addUserModal">
            <div class="modal-header">
                <h3 class="modal-title">
                    [{[ (vm.user.id) ? "Edit User" : "Add User" ]}]
                </h3>
            </div>
            <div class="modal-body">
                <form name="userEditForm" method="POST" action="item">
                    <fieldset class="form-group row" ng-class="{ 'has-danger': userEditForm.name.$invalid }"
                        ng-disabled="vm.user.id">
                        <label class="col-sm-3 form-control-label">Name</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" required placeholder="Name"
                                   ng-model="vm.user.name"/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row" ng-class="{ 'has-danger': userEditForm.email.$invalid }"
                              ng-disabled="vm.user.id">
                        <label class="col-sm-3 form-control-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" required placeholder="Email"
                                   ng-model="vm.user.email"/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row" ng-class="{ 'has-danger': userEditForm.password.$invalid }"
                              ng-disabled="vm.user.id">
                        <label class="col-sm-3 form-control-label">Password</label>
                        <div class="col-sm-9">
                            <input name="password" type="password" class="form-control" ng-required="!vm.user.id"
                                   placeholder="Password" ng-model="vm.user.password"/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row" ng-class="{ 'has-danger': userEditForm.role.$invalid }">
                        <label class="col-sm-3 form-control-label">Role</label>
                        <div class="col-sm-9">
                            <select style="height: 36px;" name="role" class="form-control" ng-model="vm.user.role"
                                    ng-options="role.key as role.name for (key, role) in vm.role_options" required>
                                <option value="" disabled selected>Select Role</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" ng-click="vm.cancel()">Cancel</button>
                <button type="button" class="btn btn-primary" ng-click="vm.save()" ng-disabled="userEditForm.$invalid">
                    Add User
                </button>
            </div>
        </script>
    </div>
@endsection
