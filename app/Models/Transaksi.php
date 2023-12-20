<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tranksaksis';
    protected $guarded =['id'];

    public function barang(): BelongsTo
    {
        return $this->BelongsTo(Barang::class);
    }
    // public function barang(): HasMany
    // {
    //     return $this->hasMany(Barang::class);
    // }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
