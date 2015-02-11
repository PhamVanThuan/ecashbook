<?php
/**
 * Created by PhpStorm.
 * User: Edi
 * Date: 2/11/2015
 * Time: 9:24 AM
 */

namespace EcashBook\Repositories;


use Illuminate\Database\Eloquent\Model;

class AbstractReposiotries
{

    /**
     * @var
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function getNew(array $attributes = [])
    {
        return $this->model->newInstance($attributes);
    }
}