<?php
 
function getID($model, $column, $value)
{
    $data =  $model::where($column, $value)->first()->id;
    return $data;
}

function SSH(){
    $connection = ssh2_connect('192.168.210.148', 22);
    ssh2_auth_password($connection, 'administrador', '1thipida8+1');

    $stream = ssh2_exec($connection, 'dir');

    dd($stream);
}