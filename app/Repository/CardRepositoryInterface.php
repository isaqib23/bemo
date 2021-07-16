<?php


namespace App\Repository;
use App\Models\Card;
use Illuminate\Support\Collection;

interface CardRepositoryInterface
{
    public function all(): Collection;

    /**
     * @param array $attributes
     * @return Card
     */
    public function create(array $attributes);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);
}
