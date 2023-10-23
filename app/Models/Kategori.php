<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    // protected $primaryKey = "id";
    protected $guarded =['id'];

}
