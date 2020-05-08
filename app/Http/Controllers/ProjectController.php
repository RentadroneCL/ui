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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id = null): View
    {
        $project = Project::query()
                    ->with('media')
                    ->findOrFail($id);

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id = null): View
    {
        $project = Project::findOrFail($id);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
