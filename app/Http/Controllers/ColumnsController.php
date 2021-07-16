<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColumnRequest;
use App\Http\Requests\DeleteColumnRequest;
use App\Repository\ColumnRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ColumnsController extends Controller
{
    /**
     * @var ColumnRepositoryInterface
     */
    private $repository;

    /**
     * ColumnsController constructor.
     * @param ColumnRepositoryInterface $repository
     */
    public function __construct(ColumnRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse
     */
    public function index(){
        $columns = $this->repository->all();

        return response()->json([
            'details' => $columns,
        ]);
    }

    /**
     * @param ColumnRequest $request
     * @return JsonResponse
     */
    public function store(ColumnRequest $request){
        $column = $this->repository->create([
            "title" => $request->input('title')
        ]);

        return response()->json([
            'details' => $column
        ]);
    }

    /**
     * @param DeleteColumnRequest $request
     * @return JsonResponse
     */
    public function destroy(DeleteColumnRequest $request){
        $column = $this->repository->delete($request->input('id'));

        return response()->json([
            'details' => $column
        ]);
    }
}
