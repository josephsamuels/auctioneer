<!DOCTYPE html>
<html lang="en" ng-app="auctioneer">
<head>
    <title>Auctioneer</title>
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/bower_components/octicons/octicons/octicons.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>
<body>


<div class="content">
    @if (!isset($hide_header) || !$hide_header)
        <nav class="navbar navbar-sticky-top navbar-dark bg-primary">
            <div class="navbar-brand">Auctioneer</div>
            @if(Auth::user())
                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item">
                        <a class="nav-link active" href="/items">Items</a>
                    </li>
                    @if(in_array(Auth::user()->role, ['supervisor', 'administrator']))
                        <li class="nav-item">
                            <a class="nav-link active" href="/users">Users</a>
                        </li>
                    @endif
                </ul>
            @endif
        </nav>
    @endif

    @yield('content')
</div>


<!-- Vendor scripts -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/tether/dist/js/tether.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/angular/angular.min.js"></script>
<script src="/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
<script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
<!-- End vendor scripts -->

<!-- Application scripts -->
<script src="/js/app.module.js"></script>
<script src="/js/app.config.js"></script>

<script src="/js/services/item.service.js"></script>
<script src="/js/services/role.service.js"></script>
<script src="/js/services/user.service.js"></script>

<script src="/js/items/items.module.js"></script>
<script src="/js/items/items.controller.js"></script>
<script src="/js/items/modal/edit-item.controller.js"></script>
<script src="/js/items/modal/remove-item.controller.js"></script>
<script src="/js/items/items-print.controller.js"></script>

<script src="/js/users/users.module.js"></script>
<script src="/js/users/users.controller.js"></script>
<script src="/js/users/modal/edit-user.controller.js"></script>
<!-- End application scripts -->

</body>
</html>
