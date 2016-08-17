@extends('masters.app', ['hide_header' => true])

@section('content')
    <div ng-controller="ItemsPrintController as vm" ng-cloak>
        <div class="col-xs-6" ng-repeat="item in vm.items | orderBy:'id'">
            <div class="card"  style="height: 230px; overflow: hidden; page-break-inside:avoid; page-break-after:auto;">
                <div class="card-block">
                    <div style="float: right" class="form-inline">
                        <strong>Lot #:</strong>
                        <input class="form-control form-control-sm" type="text" style="width: 80px;" />
                    </div>
                    <p class="card-text"><strong>Item:</strong> [{[ item.short_description ]}]</p>
                    <p class="card-text"><strong>Source:</strong> [{[ item.source ]}]</p>
                    <p class="card-text"><strong>Description:</strong> [{[ item.full_description ]}]</p>
                </div>
            </div>
        </div>
    </div>
@endsection
