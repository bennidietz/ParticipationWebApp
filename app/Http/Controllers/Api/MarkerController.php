<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarkerStore;
use App\Http\Resources\MarkerCollection;
use App\Http\Resources\MarkerResource;
use App\Models\Asset;
use App\Models\Marker;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MarkerCollection
     */
    public function index()
    {
        return new MarkerCollection(Marker::where('visible', '=', '1')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $marker = Marker::make();

        return view('markers.edit', [
            'marker' => $marker,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(MarkerStore $request)
    {
        return Marker::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Marker $marker
     * @return MarkerResource
     */
    public function show(Marker $marker)
    {
        return new MarkerResource($marker);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Marker $marker
     * @return Marker|Application|ResponseFactory|Response
     */
    public function update(Request $request, Marker $marker)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'file_path' => 'string',
            'object' => 'string',
            'type' => 'string',
            'visible' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $marker->update($request->all());

        return $marker;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Marker $marker
     * @return string[]
     */
    public function destroy(Marker $marker)
    {
        Marker::destroy($marker->id);
        return ['status' => '200'];
    }
}
