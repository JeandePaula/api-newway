<?php

namespace App\Domains\Users\Services;

use App\Services\ServiceBase;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;
use App\Domains\Users\Repositories\UserRepository;

class UserService extends ServiceBase
{
    /**
     * @var $repository
     * @var $validator
     */
    protected $repository = UserRepository::class;
    protected $validator = null;

    /**
     * Service constructor.
     */
    public function __construct()
	{
		$this->checkRepository();
	}

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
            $validator = Validator::make($data, $this->validator);

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
            $validator = Validator::make($data, $this->validator);

            if ($validator->fails()) 
                throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = app($this->repository)->store($data);

        return $result;
    }
}
