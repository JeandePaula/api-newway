<?php

namespace App\Services;

use Exception;
use InvalidArgumentException;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\Validator;

abstract class ServiceBase implements ServiceInterface
{
    /**
     * @var $repository
     * @var $validator
     */
    protected $repository;
    protected $validator = null;

    /**
     * Service constructor.
     */
    public function __construct()
	{
		$this->checkRepository();
	}

    /**
     * Function to check if repository exists.
    */
    protected function checkRepository()
    {
        if (is_null($this->repository))
            throw new Exception('Repository não definido');
    }

    /**
     * Delete data by id.
     *
     * @param $id
     * @return Object
     */
    public function delete(int $id)
    {
        $data = app($this->repository)->delete($id);
        return $data;
    }

    /**
     * Get all data.
     *
     * @return Array
     */
    public function getAll()
    {
        return app($this->repository)->getAll();
    }

    /**
     * Get data by id.
     *
     * @param $id
     * @return Object
     */
    public function findById(int $id)
    {
        return app($this->repository)->findById($id);
    }

    /**
     * Update data by id
     * Update to DB if there are no errors.
     *
     * @param array $data
     * @param $id
     * @return Object
     */
    public function update($data, int $id)
    {
        if ($this->validator != null) {
            $validator = Validator::make($data, app($this->validator)->rules($id));

            if ($validator->fails()) 
                throw new InvalidArgumentException($validator->errors()->first());
            
        }

        $data = app($this->repository)->update($data, $id);
        return $data;
    }

    /**
     * Validate data $data.
     *
     * @param array $data
     * @return Object
     */
    public function store($data)
    {
        if ($this->validator != null) {
            $validator = Validator::make($data, app($this->validator)->rules());

            if ($validator->fails()) 
                throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = app($this->repository)->store($data);

        return $result;
    }
}
