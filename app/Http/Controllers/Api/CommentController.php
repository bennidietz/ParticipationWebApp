<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStore;
use App\Http\Requests\ReportStore;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Http\Resources\VoteCollection;
use App\Models\Comment;
use App\Models\Marker;
use App\Models\Report;
use App\Models\Suggestion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CommentCollection
     */
    public function index()
    {
        return new CommentCollection(Comment::where('visible', '=', '1')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CommentStore $request)
    {
        return Comment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return CommentResource
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return Comment|Application|ResponseFactory|Response
     */
    public function update(Request $request, Comment $comment)
    {
        $validator = Validator::make($request->all(), [
            'suggestion_id' => 'numeric',
            'user_id' => 'numeric',
            'message' => 'string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $comment->update($request->all());

        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return string[]
     */
    public function destroy(Comment $comment)
    {
        Comment::destroy($comment->id);
        return ['status' => '200'];
    }

    public function getCommentsOfComment(Comment $comment)
    {
        return new CommentCollection($comment->comments);
    }

    public function getVotesOfComment(Comment $comment)
    {
        return new VoteCollection($comment->votes);
    }

    public function resportComment(ReportStore $request, Comment $comment)
    {
        return Report::create(
            array_merge($request->all(), ['comment_id' => $comment->id])
        );
    }
}
