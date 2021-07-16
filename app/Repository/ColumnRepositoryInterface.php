<?php


namespace App\Repository;
use App\Models\Column;
use Illuminate\Support\Collection;

interface ColumnRepositoryInterface
{
    public function all(): Collection;

    /**
     * @param array $attributes
     * @return Column
     */
    public function create(array $attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
