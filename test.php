<?php 
$hoge =$_SERVER["SERVER_NAME"];

echo($hoge."<br><br>");

// require_once('env.php');
// echo( $production_server_env->host);
require('funcs.php');
$server_info = switch_server_env();
// echo($hoge->db_name);
echo("<br><br>");

$count = 0;
foreach ($server_info as $key => $value) {
    if (gettype($value)== "string") {
        $count++;
        echo((string)$count." / ".$key." / ".$value."<br>");
    }elseif(gettype($value)== "array"){
        $count++;
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        echo((string)$count." / ".$key." / ".$value[0]."<br>");
    }
}
echo "<br>(string)$server_info->table_name_in_DB[0]:  ".$server_info->table_name_in_DB[0];
?>
<h1>test page</h1>