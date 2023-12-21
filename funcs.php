<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


function switch_server_env(){
    require_once("env.php");
    $server_env_flag =(object) [
        'development' => 'localhost',
        'production' => null,
    ];

    $server = $_SERVER["SERVER_NAME"];

    $info_object = (object) [
        "host_env" =>"",
        'db_name' => '',
        'table_name_in_DB' => null,
        'charset'=> "",
        'host' => "",
        'id' => "",
        'pw' => "",
    ];
    
    if ($server == $server_env_flag->development) {
        $info_object = (object) [
            "host_env" =>"development",
            'db_name' => 'gs_231220kadai',
            'table_name_in_DB' => ['gs_231220kadai'],
            'charset'=> "utf8",
            'host' => "127.0.0.1",
            'id' => "root",
            'pw' => "",
        ];  
    }else{
        $info_object->host_env =            "production";
        $info_object->db_name =             $production_server_env->db_name;
        $info_object->table_name_in_DB   =  $production_server_env->table_name_in_DB;
        $info_object->charset=              $production_server_env->charset;
        $info_object->host =                $production_server_env->host;
        $info_object->id =                  $production_server_env->id;
        $info_object->pw =                  $production_server_env->pw;
        
    }

    return $info_object;
}