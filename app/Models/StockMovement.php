<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StockMovement extends Model
{
    use HasFactory;

    protected $table = 'stock_movements';
    protected $fillable = [
        'product_id',
        'branch_id',
        'type',
        'qty',
        'tanggal',
        'keterangan'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function branch()
    {
    return $this->belongsTo(Branch::class);
    }

}