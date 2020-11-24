<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaTrabajo extends Model
{
    protected $table ='tbl_diatrabajo';
    protected $fillable =['dia','activo','mañana_inicio','mañana_fin','tarde_inicio','tarde_fin','user_id'];
}
