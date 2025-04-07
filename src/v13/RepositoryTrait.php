<?php

namespace App\Ship\LegacyBridge;

use Apiato\Core\Repositories\Exceptions\ResourceNotFound;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait RepositoryTrait
{
    public function find($id, $columns = ['*'])
    {
        // This is for the compatibility package. Keep this one.
        return parent::find($id, $columns) ?? throw (new ModelNotFoundException)->setModel(get_class($this->model));
    }

    public function create(array $attributes)
    {
        try {
            return parent::create($attributes);
        } catch (\Exception) {
            throw new \Exception(class_basename($this->model()));
        }
    }

    public function update(array $attributes, $id)
    {
        try {
            return parent::update($attributes, $id);
        } catch (ResourceNotFound) {
            throw (new ModelNotFoundException)->setModel(get_class($this->model));
        }
    }
}
