<?php

namespace App\Domains\Products\Services;

use App\Services\ServiceBase;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;
use App\Domains\Products\Repositories\ProductRepository;
use App\Domains\Products\Validators\ProductValidator;

class ProductService extends ServiceBase
{
    /**
     * @var $repository
     * @var $validator
     */
    protected $repository = ProductRepository::class;
    protected $validator = ProductValidator::class;

    /**
     * Delete data by id.
     *
     * @param $id
     * @return String
     */
    public function delete($id)
    {
        $data = app($this->repository)->delete($id);
        return $data;
    }

 
    public function getAll()
    {
        return app($this->repository)->getAll();
    }

    /**
     * Get data by id.
     *
     * @param $id
     * @return String
     */
    public function findById($id)
    {
        return app($this->repository)->findById($id);
    }

    /**
     * Update data data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @param $id
     * @return String
     */
    public function update($data, $id)
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
     * @return String
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
