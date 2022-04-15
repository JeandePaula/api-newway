<?php

namespace App\Domains\Products\Repositories;

use InvalidArgumentException;
use App\Repository\RepositoryBase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Domains\Products\Models\ProductRanking;

class RankingRepository extends RepositoryBase
{
    protected $model = ProductRanking::class;

    /**
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return Object
     */
    public function store($data)
    {
        if($object = app($this->model)->where('product_id',$data['product_id'])->first())
        {
            $object->votes += 1;
        }
        else
        {
            $object = new $this->model;
            $object->product_id = $data['product_id'];
            $object->votes = 1;
        }
       
        DB::beginTransaction();

		try
		{
			if ($object->save())
			{
				DB::commit();
				return $object;
			}

			DB::rollBack();
			return false;

		}
		catch (\Exception $e)
		{
            DB::rollBack();
            Log::info($e->getMessage());
			throw new InvalidArgumentException('Unable to store post data');
		}
    }
}
