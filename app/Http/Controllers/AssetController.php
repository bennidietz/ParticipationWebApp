<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetStore;
use App\Http\Resources\AssetCollection;
use App\Http\Resources\AssetResource;
use App\Models\Asset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $assets = Asset::orderBy('name')->paginate(10);

        return view('assets.index', [
            'assets' => $assets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(AssetStore $request)
    {
        return Asset::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Asset $asset
     * @return AssetResource
     */
    public function show(Asset $asset)
    {
        return new AssetResource($asset);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Asset $asset
     * @return Asset|Application|ResponseFactory|Response
     */
    public function update(Request $request, Asset $asset)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'file_path' => 'string',
            'object' => 'string',
            'type' => 'string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $asset->update($request->all());

        return $asset;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Asset $asset
     * @return Response
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
