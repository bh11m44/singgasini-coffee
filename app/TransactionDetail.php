<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id', 'products_id', 'carts_id', 'kuantitas', 'harga', 'status', 'code',
    ];

    protected $hidden = [
        
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id', 'carts_id');
    }
}
