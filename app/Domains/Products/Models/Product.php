<?php

namespace App\Domains\Products\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type_id'
    ];

    /**
     * Get the type associated with the product.
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
