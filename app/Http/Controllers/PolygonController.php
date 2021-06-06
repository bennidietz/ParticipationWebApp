<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolygonStore;
use App\Http\Resources\PolygonResource;
use App\Models\Polygon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PolygonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PolygonResource
     */
    public function index()
    {
        return new PolygonResource(Polygon::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(PolygonStore $request)
    {
        return Polygon::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Polygon $polygon
     * @return PolygonResource
     */
    public function show(Polygon $polygon)
    {
        return new PolygonResource($polygon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Polygon $polygon
     * @return Response
     */
    public function edit(Polygon $polygon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Polygon $polygon
     * @return Polygon|Application|ResponseFactory|Response
     */
    public function update(Request $request, Polygon $polygon)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'geojson' => 'string',
            'state' => 'string|max:50',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $polygon->update($request->all());

        return $polygon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Polygon $polygon
     * @return Response
     */
    public function destroy(Polygon $polygon)
    {
        //
    }
}
