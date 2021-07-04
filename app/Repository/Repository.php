<?php


namespace App\Repository;


use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

abstract class Repository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * @return mixed
     */
    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($object)
    {

       DB::beginTransaction();
        try {
            $object->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
        }
    }

    public function update($object)
    {
        DB::beginTransaction();
        try {
            $object->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
        }
    }

    public function destroy($data)
    {
       $this->model->destroy($data);
    }
}
