<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'title',
        'list_id',
        'maxPrice',
        'price',
    ];

    public function List() : BelongsTo
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
