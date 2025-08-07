<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /*
     * para evitar de criar update_at & create_at no banco de dados
     */
    public $timestamps = false;
}
