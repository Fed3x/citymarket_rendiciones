<?php
 
function getID($model, $column, $value)
{
    $data =  $model::where($column, $value)->first()->id;
    return $data;
}