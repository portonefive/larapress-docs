<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LaraPress\Contracts\Repository as RepositoryContract;

abstract class Repository implements RepositoryContract {

    /** @var Model */
    protected $model;

    public function __construct()
    {
        $modelClassName = $this->getModelClassName();

        return $this->model = new $modelClassName;
    }

    /**
     * @param $id
     *
     * @return Model|null
     */
    public function findById($id)
    {
        return $this->model->where('ID', $id)->get()->first();
    }

    /**
     * @param $name
     *
     * @return Model|null
     */
    public function findByName($name)
    {
        return $this->model->where('post_name', $name)->get()->first();
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }
}
