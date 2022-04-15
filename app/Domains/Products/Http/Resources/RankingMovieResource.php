<?php

namespace App\Domains\Products\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingMovieResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'votes' => (int) $this->votes
        ];
    }
}
