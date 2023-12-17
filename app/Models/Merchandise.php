<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function purchased_item() {
        return $this->hasMany(PurchasedItem::class);
    }

    public function sold_item() {
        return $this->hasMany(SoldItems::class);
    }
}
