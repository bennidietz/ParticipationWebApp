<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuggestionStore;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\SuggestionCollection;
use App\Http\Resources\SuggestionResource;
use App\Models\Suggestion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return new SuggestionCollection(Suggestion::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(SuggestionStore $request)
    {
        return Suggestion::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Suggestion $suggestion
     * @return SuggestionResource
     */
    public function show(Suggestion $suggestion)
    {
        return new SuggestionResource($suggestion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Suggestion $suggestion
     * @return Suggestion|Application|ResponseFactory|Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'numeric',
            'asset_id' => 'numeric',
            'geojson' => 'string',
            'latitude' => 'string',
            'longitude' => 'string',
            'title' => 'string',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $suggestion->update($request->all());

        return $suggestion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Suggestion $suggestion
     * @return Response
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }

    public function getCommentsOfSuggestion(Suggestion $suggestion)
    {
        return new CommentCollection($suggestion->comments);
    }
}
