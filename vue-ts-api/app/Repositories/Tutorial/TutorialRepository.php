<?php

namespace App\Repositories\Tutorial;

use App\Models\Tutorial;
use App\Repositories\BaseRepository;



class TutorialRepository extends BaseRepository implements TutorialInterface
{
    public function getModel()
    {
        return Tutorial::class;
    }

    public function get(string $title)
    {
        if ($title) {
            return $this->model->where('title', 'like', '%' . $title . '%')->get();
        }
        return $this->getAll();
    }

    public function show(int $id)
    {
        return $this->find($id);
    }

    public function store(array $data)
    {
        try {
            $tutorial = $this->create($data);
            return $tutorial ? true : false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateTutorial(int $id, array $data)
    {
        try {
            $tutorial = $this->update($id, $data);
            return $tutorial ? true : false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(int $id)
    {
        try {
            $res = $this->delete($id);
            return $res ? true : false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteAll()
    {
        if ($this->model->truncate()) {
            return true;
        }
        return false;
    }
}
