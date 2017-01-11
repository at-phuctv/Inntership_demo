<?php

namespace App\Repositories;

interface InterfaceRepository
{
    /**
     * Declare function find by id.
     *
     * @param int $id Id of Model
     *
     * @return Eloquent
     */
    public function find($id);
    /**
     * Declare function get all Model.
     *
     * @param array $columns Array columns
     *
     * @return array Array Eloquent
     */
    public function all($columns = array('*'));
    /**
     * This function use for update Eloquent.
     *
     * @param array $inputs Data
     * @param int   $id     Id of Eloquent
     *
     * @return \Illuminate\Database\Eloquent
     */
    public function update($inputs, $id);
    /**
     * This function use for delete Eloquent.
     *
     * @param int $id ID of Eloquent
     *
     * @return \Illuminate\Database\Eloquent
     */
    public function delete($id);
}
