<?php
require_once('model.php');
$user = new User();
$rst = new Restaurant();
$rev = new Review();
$repo = new Report();

echo '<pre>';
var_dump($user->get_Userdetail(['user_id'=>'test']));
echo '<br>';
var_dump($rst->get_RstDetail(['rst_id'=>'1']));
echo '<br>';
var_dump($rev->get_RevDettail(['review_id'=>'1']));
echo '<br>';
$reports = $repo->getList();
var_dump($reports);
echo '<br>';
foreach ($reports as $report) {
    var_dump($report);
}
echo '</pre>';

//確認用URL：http://localhost/pbl_lunch_hunter/?do=pg_lookdata