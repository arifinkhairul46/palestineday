<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominal extends Model
{
    use HasFactory;
    protected $table = 'm_nominal_donasi';
    protected $primaryKey = 'id';
}
