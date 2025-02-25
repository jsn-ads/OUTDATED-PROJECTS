<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    /* Caso a CLASSE ou/e  ID não tenha mesmo nome da tabela pode definir aqui o nome
     * 
     * protected $table = 'ex:nome da tabela';
     * protected $primaryKey = 'id'
     * public $incrementing = false;
     * protected $keyType = 'string';
     * 
     * caso tenha create_at/upated_at e tenha outro nome utilizar esse modelo para referenciar esse campos
     * 
     * const CREATED_AT = 'ex:'aa'
     * const UPDATED_AT = 'ex:'bb'
     */

     public $timestamps = false;
    
}
