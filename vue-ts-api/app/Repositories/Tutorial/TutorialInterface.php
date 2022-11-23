<?php

namespace App\Repositories\Tutorial;

use App\Repositories\BaseInterface;


interface TutorialInterface extends BaseInterface
{
  public function get(string $title);
  public function show(int $id);
  public function store(array $data);
  public function updateTutorial(int $id , array $data);
  public function destroy(int $id);
  public function deleteAll();
}
