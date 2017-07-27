<?php
function currencyConverter($currency_from,$currency_to,$currency_input){
$yql_base_url = "http://query.yahooapis.com/v1/public/yql";
$yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
$yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
$yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
$yql_session = file_get_contents($yql_query_url);
$yql_json =  json_decode($yql_session,true);
$currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

return $currency_output;
}

$currency_input = 1;
// currency codes : http://en.wikipedia.org/wiki/ISO_4217
$currency_from = "USD";
$currency_to = "GEL";
$currency = currencyConverter($currency_from,$currency_to,$currency_input);
// echo $currency_input.' '.$currency_from.' = '.$currency.' '.$currency_to;
?>
        

<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<div ng-app="" style="width: 500px;margin:auto;margin-top:30px;">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon primary"></span>
<input type="text" placeholder="0" class="form-control" ng-model="gel">
</div>
</div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon primary" id="other"></span>
<input type="text" placeholder="0" class="form-control" ng-model="gel * <?php echo $currency ?>" ng-model="gel" disabled="">
</div>
</div>
</div>
<style type="text/css">
.input-group-addon.primary {
    background: none;
    background-image: url(img/ge-en.png);
    width: 38px;
    background-size: 65px;
    background-position: -14% 49%;
    background-repeat: no-repeat;
    overflow: hidden; 
}
#other {
        background-image: url(img/gb.png);
    background-size: 33px 31px;
    background-position: 79% 0%;
}
.input-group-addon.success {
    color: rgb(255, 255, 255);
    background-color: rgb(92, 184, 92);
    border-color: rgb(76, 174, 76);
}
.input-group-addon.info {
    color: rgb(255, 255, 255);
    background-color: rgb(57, 179, 215);
    border-color: rgb(38, 154, 188);
}
.input-group-addon.warning {
    color: rgb(255, 255, 255);
    background-color: rgb(240, 173, 78);
    border-color: rgb(238, 162, 54);
}
.input-group-addon.danger {
    color: rgb(255, 255, 255);
    background-color: rgb(217, 83, 79);
    border-color: rgb(212, 63, 58);
}
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child>.btn-group:not(:first-child)>.btn, .input-group-btn:first-child>.btn:not(:first-child), .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group>.btn, .input-group-btn:last-child>.dropdown-toggle {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    width: 400px;
    border-left: none;
    background: none;
}

</style>
