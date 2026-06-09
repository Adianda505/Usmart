<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'kode_transaksi',
        'user_id',
        'branch_id',
        'total',
        'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(Transactions_detail::class, 'transaction_id', 'id');
    }

    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}