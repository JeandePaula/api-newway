<?php

namespace App\Domains\Products\Repositories;

use App\Repository\RepositoryBase;
use Illuminate\Support\Facades\DB;

class RankingMovieRepository extends RepositoryBase
{
    protected $model = '';

     /**
     * Get all data.
     *
     * @return Array
     */
    public function getAll()
    {

        $ranking = DB::select('
        SELECT P.name, ifnull(PR.votes,0) votes 
        FROM products P LEFT join product_ranking PR 
        ON P.id = PR.product_id 
        WHERE P.type_id = 1
        Order By PR.votes desc;');

        return $ranking;
    }
}
