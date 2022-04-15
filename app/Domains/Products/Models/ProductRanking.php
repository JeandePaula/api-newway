<?php

namespace App\Domains\Products\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRanking extends Model
{
    public $timestamps = false;
    protected $table = 'product_ranking';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'votes'
    ];
}
