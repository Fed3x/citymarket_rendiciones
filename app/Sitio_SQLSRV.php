<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitio_SQLSRV extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'dim_sitios';

    protected $primaryKey = 'identificador';
}
