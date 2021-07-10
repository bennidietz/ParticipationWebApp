<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteStore;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\VoteResource;
use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CommentCollection
     */
    public function index()
    {
        return new CommentCollection(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(VoteStore $request)
    {
        return Comment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Vote $vote
     * @return VoteResource
     */
    public function show(Vote $vote)
    {
        return new VoteResource($vote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Vote $vote
     * @return Vote|Application|ResponseFactory|Response
     */
    public function update(Request $request, Vote $vote)
    {
        $validator = Validator::make($request->all(), [
            'suggestion_id' => 'numeric',
            'comment_id' => 'numeric',
            'user_id' => 'numeric',
            'is_positive' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $vote->update($request->all());

        return $vote;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vote $vote
     * @return Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
