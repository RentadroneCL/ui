<?php

use App\Project;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Resources\{
    Project as ProjectResource,
    Media as MediaResource,
    MediaCollection
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/project', 'ProjectController');

Route::get('/', 'ProjectController@index')->name('project.index');

Route::post('/project/{project}/media/upload', 'UploadMedia')->name('media.upload');

Route::get('/api/v1/project/{project}', function (int $id = null) {
    return new ProjectResource(Project::findOrFail($id));
})->name('project');

Route::get('/api/v1/project/{project}/media', function (int $id = null) {
    return new MediaCollection(
        Media::query()
            ->where([
                'model_type' => Project::class,
                'model_id' => $id
            ])
            ->get()
    );
})->name('project.media');
