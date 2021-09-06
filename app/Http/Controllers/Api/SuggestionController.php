<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportStore;
use App\Http\Requests\SuggestionStore;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\SuggestionCollection;
use App\Http\Resources\SuggestionResource;
use App\Http\Resources\VoteCollection;
use App\Models\Marker;
use App\Models\Report;
use App\Models\Suggestion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SuggestionCollection
     */
    public function index()
    {
        return new SuggestionCollection(Suggestion::where('visible', '=', '1')->get());
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
            'marker_id' => 'numeric',
            'geojson' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'title' => 'string',
            'description' => 'string',
            'visible' => 'boolean',
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
     * @return string[]
     */
    public function destroy(Suggestion $suggestion)
    {
        Suggestion::destroy($suggestion->id);
        return ['status' => '200'];
    }

    public function getCommentsOfSuggestion(Suggestion $suggestion)
    {
        return new CommentCollection($suggestion->comments->where('visible', '=', '1'));
    }

    public function getVotesOfSuggestion(Suggestion $suggestion)
    {
        return new VoteCollection($suggestion->votes);
    }

    public function resportSuggestion(ReportStore $request, Suggestion $suggestion)
    {
        return Report::create(
            array_merge($request->all(), ['suggestion_id' => $suggestion->id])
        );
    }
}
