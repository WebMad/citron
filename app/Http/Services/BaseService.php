<?php


namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseService
 * @package App\Http\Services
 */
abstract class BaseService
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseService constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Возвращает все записи в таблице
     * @param array $relations
     * @param array $where
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function all($relations = [], $where = [])
    {
        $result = $this->model::with($relations);
        foreach ((array)$where as $condition) {
            $result->where($condition[0], $condition[1], $condition[2]);
        }
        return $result->get()->all();
    }

    /**
     * Создает запись и возвращает ее
     * @param $params
     * @return Model
     */
    public function create($params)
    {
        return $this->model::create($params);
    }

    /**
     * Возврщает запись по id
     * @param int $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model::find($id);
    }

    /**
     * @param $id
     * @param $params
     * @return Model
     */
    public function update($id, $params)
    {
        /** @var Model $model */
        $model = $this->find($id);
        $model->update($params);
        return $model;
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function delete($id)
    {
        /** @var Model $model */
        $model = $this->find($id);
        $model->delete();
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

}
