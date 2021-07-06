<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $baseData = parent::toArray($request);
        $baseUrl = 'http://giv-project10.uni-muenster.de/';

        return array_merge($baseData, [
            'file' => substr_count($baseData['file_path'], 'public/assets/') > 0 ? $baseUrl . str_replace('public/', 'storage/', $baseData['file_path']) : $baseData['file_path']
        ]);
    }
}
