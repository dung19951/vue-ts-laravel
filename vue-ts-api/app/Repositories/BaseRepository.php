<?php

namespace App\Repositories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        try {
            $result = $this->find($id);
            if ($result) {
                $result->update($attributes);
                return $result;
            }
            return false;
        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->find($id);
            if ($result) {
                $result->delete();

                return true;
            }
            return false;
        } catch (\Exception$e) {
        }
    }

    public function generateUuid($table, $prefix){
        $str = substr(Str::uuid()->getHex(), 0, 20);
        return DB::table($table)->where('id', $prefix.'_'.$str)->exists() ? $this->generateUuid($table, $prefix) : $prefix.'_'.$str;
    }

}
