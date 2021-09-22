<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $baseData = parent::toArray($request);
        $baseUrl = isset($_SERVER['HTTPS']) ? 'https://correnslab.de' : 'http://correnslab.de/';

        if (isset($baseData['file_path']) && $baseData['file_path'] && substr_count($baseData['file_path'], 'public/assets/') > 0) {
            $baseData['file_path'] = $baseUrl . str_replace('public/', 'storage/', $baseData['file_path']);
        }

        return $baseData;
    }
}
