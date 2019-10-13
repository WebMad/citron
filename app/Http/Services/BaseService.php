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

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Возвращает все записи в таблице
     * @return Collection|Model[]
     */
    public function all()
    {
        return $this->model::all();
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

    public function update($id, $params)
    {
        /** @var Model $model */
        $model = $this->model::find($id);
        $model->update($params);
        return $model;

    }

    public function delete($id)
    {
        /** @var Model $model */
        $model = $this->model::find($id);
        try {
            $model->delete();
            return true;

        } catch (\Exception $e) {
            return false;
        }
    }


}
