@extends('default')

@section('content')
<div class="w-full flex flex-col items-center justify-start p-4">
  <a class="w-32 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold mr-auto py-3 px-4 rounded" href="{{ route('project.index') }}">
    <i class="fas fa-arrow-left fa-fw text-blue-200 mr-1"></i> Back
  </a>
  <h3 class="tracking-wider font-medium text-gray-700 mt-4 mb-1 mr-auto">{{ $project->name }}</h3>
  <p class="tracking-wider text-sm text-gray-600 mr-auto">{{ $project->description }}</p>
</div>
<div class="w-full flex flex-col items-center justify-start mt-4 p-4">
  <h3 class="w-full flex flex-row items-center font-medium text-lg text-blue-700 mb-4 p-2 border-b">
    <i class="fas fa-map-marked fa-fw text-blue-200 mr-1"></i> Map
  </h3>
  <h3 class="w-full flex flex-row items-center font-medium text-lg text-blue-700 mb-4 p-2 border-b">
    <i class="fas fa-images fa-fw text-blue-200 mr-1"></i> Media Files
  </h3>
  <div class="w-full flex flex-col items-center justify-start mt-4">
    <upload-component class="mr-auto" endpoint="{{ route('media.upload', $project) }}" csrf="{{ csrf_token() }}" target="#media"></upload-component>
    <div id="media" class="flex flex-col lg:flex-row items-center justify-start">
    </div>
  </div>
</div>
@endsection