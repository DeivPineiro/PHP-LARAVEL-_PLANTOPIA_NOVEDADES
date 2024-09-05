<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //use HasFactory;
    protected $table = 'topicos';
    protected $primaryKey = 'topico_id';   
}
