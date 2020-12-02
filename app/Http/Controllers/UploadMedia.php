<?php

namespace App\Http\Controllers;

use Gmagick;
use App\Project;
use PHPExif\Reader\Reader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\{Request, JsonResponse};

class UploadMedia extends Controller
{
    /**
     * Upload project's media.
     *
     * @param Project $project
     * @param Request $request
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     *
     * @return JsonResponse
     */
    public function __invoke(Project $project, Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'files.*' => 'required|file|mimes:jpeg,jpg,tiff|max:102400',
        ]);

        $reader = Reader::factory(Reader::TYPE_EXIFTOOL);

        $media = $project->addMediaFromRequest('files')
                    ->withCustomProperties([
                        'data' => $reader->read($request->file('files')[0]->path())->getData(),
                        'raw_data' => $reader->read($request->file('files')[0]->path())->getRawData(),
                    ])
                    ->toMediaCollection('images');

        // Generate jpg transformation images only for the orthomosaic inputs
        if ($media->mime_type === 'image/tiff' ) {
            $imagick = new Gmagick($media->getPath());
            $imagick->write("{$media->name}.jpg");

            $transformation = $project->addMedia(public_path("{$media->name}.jpg"))->toMediaCollection('images');

            $gpsComputed = preg_split('/ /', $reader->read($media->getPath())->getRawData()['IFD0:ModelTiePoint']);

            $media->setCustomProperty('data.gps', "{$gpsComputed[4]},{$gpsComputed[3]}");
            $media->setCustomProperty('tiff2jpg', $transformation->getUrl());
            $media->saveOrFail();
        }

        return response()->json([
            'status' => 'success',
            'media' => [
                'id' => $media->id,
                'name' => $media->name,
                'mime_type' => $media->mime_type,
                'public_url' => $media->getUrl(),
                'created_at' => $media->created_at->diffForHumans(),
                'data' => $media->getCustomProperty('data'),
                'raw_data' => $media->getCustomProperty('raw_data'),
            ],
        ]);
    }
}
