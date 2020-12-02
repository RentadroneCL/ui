@extends('default')

@section('content')
<a class="w-48 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded" href="{{ route('project.create') }}">
  <i class="fas fa-project-diagram fa-fw text-blue-200 mr-1"></i> Create project
</a>

<div id="projects" class="flex flex-col items-cemter my-4">
  <div class="table w-full tracking-wider text-gray-700">
    <div class="table-row-group">
      <div class="table-row font-medium uppercase">
        <div class="table-cell px-4 py-2 text-sm text-blue-800">Name</div>
        <div class="table-cell px-4 py-2 text-sm text-blue-800">Description</div>
        <div class="table-cell px-4 py-2 text-sm text-blue-800">Created At</div>
        <div class="table-cell px-4 py-2 text-sm"></div>
      </div>
    </div>
    @forelse ($projects as $project)
      <div class="table-row-group">
        <div data-controller="delete" data-delete-endpoint="{{ route('project.destroy', $project) }}" class="table-row">
          <div class="table-cell px-4 py-2 border-t">{{ $project->name }}</div>
          <div class="table-cell px-4 py-2 border-t">{{ $project->description ?? 'N/A'}}</div>
          <div class="table-cell px-4 py-2 border-t">{{ $project->created_at }}</div>
          <div class="table-cell px-4 py-2 border-t">
            <div class="flex flex-row items-center">
              <a class="bg-blue-200 text-blue-700 px-4 py-2 rounded-l-full" href="{{ route('project.show', $project) }}">
                <i class="fas fa-eye fa-fw"></i> View
              </a>
              {{-- <a class="bg-blue-200 text-blue-700 px-4 py-2" href="!#">
                <i class="fas fa-sync"></i> Process
              </a> --}}
              <a class="bg-blue-200 text-blue-700 px-4 py-2" href="{{ route('project.edit', $project) }}">
                <i class="fas fa-edit fa-fw"></i> Edit
              </a>
              <a data-action="click->delete#destroy" class="bg-red-200 text-red-700 px-4 py-2 rounded-r-full" href="#!">
                <i class="fas fa-trash fa-fw"></i> Delete
              </a>
            </div>
          </div>
        </div>
      </div>
    @empty
  </div>
  <div class="block w-full flex flex-col items-center justify-center p-6">
    <p class="table-cell px-4 py-2 font-medium text-blue-800">No matches</p>
    <p class="table-cell px-4 py-2 text-sm text-blue-700">We can't find a match.</p>
  </div>
  @endforelse

  {{ $projects->links() }}
</div>
@endsection
