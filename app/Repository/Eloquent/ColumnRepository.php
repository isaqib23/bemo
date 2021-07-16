<?php


namespace App\Repository\Eloquent;


use App\Models\Column;
use Illuminate\Support\Collection;

/**
 * Class ColumnRepository
 * @package App\Repository\Eloquent
 */
class ColumnRepository extends BaseRepository implements \App\Repository\ColumnRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Column $model
     */
    public function __construct(Column $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->select('id','title')->with('cards')->get();
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
     * @param $id
     * @return int|mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
