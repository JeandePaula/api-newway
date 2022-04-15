<?php

namespace App\Services;

interface ServiceInterface
{
    /**
     * Delete data by id.
     *
     * @param $id
     * @return Object
     */
    public function delete(int $id);

    /**
     * Get all data.
     *
     * @return Array
     */
    public function getAll();

    /**
     * Get data by id.
     *
     * @param $id
     * @return Object
     */
    public function findById(int $id);

    /**
     * Update data by id
     * Update to DB if there are no errors.
     *
     * @param array $data
     * @param $id
     * @return Object
     */
    public function update($data, int $id);

    /**
     * Validate data $data.
     *
     * @param array $data
     * @return Object
     */
    public function store($data);
}