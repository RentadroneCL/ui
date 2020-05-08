<?php

namespace App\Http\Controllers;

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
            'files.*' => 'required|file|image|mimes:jpeg,jpg|max:5120',
        ]);

        $reader = Reader::factory(Reader::TYPE_EXIFTOOL);

        $media = $project->addMediaFromRequest('files')
                    ->withCustomProperties([
                        'data' => $reader->read($request->file('files')[0]->path())->getData(),
                        'raw_data' => $reader->read($request->file('files')[0]->path())->getRawData(),
                    ])
                    ->toMediaCollection('images');

        return response()->json([
            'status' => 'success',
            'model' => $media,
        ]);
    }
}
