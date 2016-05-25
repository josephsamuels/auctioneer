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
    @yield('content')
</div>

<script src="/bower_components/angular/angular.min.js"></script>

<script src="/js/app.module.js"></script>
<script src="/js/app.config.js"></script>

<script src="/js/services/data.service.js"></script>

<script src="/js/items/items.module.js"></script>
<script src="/js/items/items.controller.js"></script>

</body>
</html>
