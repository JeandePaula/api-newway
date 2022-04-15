<?php

namespace App\Repository;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

abstract class RepositoryBase implements RepositoryInterface
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * Repository constructor.
     */
    public function __construct()
	{
		$this->checkModel();
	}

    /**
     * Function to check if model exists.
     */
    protected function checkModel()
    {
        if (is_null($this->model))
            throw new Exception('Model não definido');
    }

    /**
     * Delete data by id.
     *
     * @param $id
     * @return Object
     */
    public function delete($id)
    {
        $data = app($this->model)->find($id)->delete();

        return $data;
    }

    /**
     * Get all data.
     *
     * @return Array
     */
    public function getAll()
    {
        return app($this->model)->get();
    }

    /**
     * Get data by id.
     *
     * @param $id
     * @return Object
     */
    public function findById($id)
    {
        return app($this->model)->find($id);
    }

    /**
     * Update to DB if there are no errors.
     *
     * @param array $data
     * @param $id
     * @return Object
     */
    public function update($data, $id)
    {
        DB::beginTransaction();

        try {

            $object = app($this->model)->find($id);
            $object->fill($data);

            if ($object->save())
			{
				DB::commit();
				return $object;
			}

            DB::rollBack();
			return false;

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return Object
     */
    public function store($data)
    {
        $object = app($this->model);
        $object->fill($data);
       
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
