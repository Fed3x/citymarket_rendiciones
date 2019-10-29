<?php
 
function getID($model, $column, $value)
{
    return  $model::where($column, $value)->first()->id;
}