<?php


namespace App\Repository\Eloquent;


use App\Models\Card;
use Illuminate\Support\Collection;

/**
 * Class ColumnRepository
 * @package App\Repository\Eloquent
 */
class CardRepository extends BaseRepository implements \App\Repository\CardRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Card $model
     */
    public function __construct(Card $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }
}
