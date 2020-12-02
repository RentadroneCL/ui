<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\{JsonResponse, Request, RedirectResponse};

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $projects = Project::query()
                        ->with('media')
                        ->latest()
                        ->paginate(10);

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable|string',
        ])->validate();

        $project = Project::create($request->except('_token'));

        session()->flash('message', 'Now you\'re ready to go!');

        return redirect()->route('project.show', $project->refresh());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function show(int $id = null): View
    {
        $project = Project::query()
                    ->with('media')
                    ->findOrFail($id);

        $media = $project->getMedia('images')->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->file_name,
                'mime_type' => $item->mime_type,
                'size' => $item->size,
                'public_url' => $item->getCustomProperty('tiff2jpg') ?? $item->getUrl(),
                'data' => $item->getCustomProperty('data'),
                'raw_data' => $item->getCustomProperty('raw_data'),
                'created_at' => $item->created_at->diffForHumans(),
            ];
        });

        return view('project.show', compact('project', 'media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function edit(int $id = null): View
    {
        $project = Project::findOrFail($id);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $id = null): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'nullable|string',
        ])->validate();

        $project = Project::findOrFail($id);

        $project->fill($request->except(['_token', '_method']))->saveOrFail();

        session()->flash('message', 'Your project details were updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     *
     * @return JsonResponse
     */
    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        session()->flash('message', 'The project has been deleted!');

        return response()->json([
            'status' => 'success',
            'data' => $project,
        ]);
    }
}
