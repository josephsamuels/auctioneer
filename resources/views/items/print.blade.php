@extends('masters.app', ['hide_header' => true])

@section('content')
    <div ng-controller="ItemsPrintController as vm" ng-cloak>
        <div class="col-xs-6" ng-repeat="item in vm.items | orderBy:'id'">
            <div class="card" style="height: 230px; overflow: hidden; page-break-inside:avoid; page-break-after:auto;">
                <div class="card-block">
                    <div style="float: right" class="form-inline">
                        <div class="form-group">
                            <strong>Lot #:</strong>
                            <input class="form-control form-control-sm" type="text" style="width: 80px;"/>
                        </div>
                    </div>
                    <p class="card-text"><strong>Item:</strong> [{[ item.short_description ]}]</p>
                    <p class="card-text" style="font-size: 0.8rem;"><strong>Description:</strong>
                        [{[ item.full_description ]}]
                    </p>
                    <p class="card-text" style="font-size: 0.8rem;"><strong>Source:</strong> [{[ item.source ]}]</p>
                    <div class="form-inline" style="position: absolute; bottom: 20px">
                        <strong>Winner:</strong>
                        <input class="form-control form-control-sm" type="text" style="width: 220px;"/>
                        <strong>Bid:</strong>
                        <input class="form-control form-control-sm" type="text" style="width: 100px;"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
