<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Repository\CardRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * @var CardRepositoryInterface
     */
    private $repository;

    /**
     * CardController constructor.
     * @param CardRepositoryInterface $repository
     */
    public function __construct(CardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(CardRequest $request){
        $data = [
            "column_id"     => $request->input('column_id'),
            "title"     => $request->input('title'),
            "description"     => $request->input('description')
        ];
        $card = $this->repository->create($data);

        return response()->json([
            'details' => $card
        ]);
    }

    /**
     * @param UpdateCardRequest $request
     * @return JsonResponse
     */
    public function update(UpdateCardRequest $request) {
        $data = [
            "column_id"         => $request->input('column_id'),
            "title"             => $request->input('title'),
            "description"       => $request->input('description'),
            "last_column"       => $request->input('last_column'),
            "last_status"       => $request->input('last_status'),
        ];

        $card = $this->repository->update($data, $request->input('id'));

        return response()->json([
            'details' => $card
        ]);
    }
}
