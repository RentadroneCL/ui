@extends('default')

@section('content')
<div class="w-full flex flex-col items-center justify-start p-4">
  <a class="w-32 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold mr-auto py-3 px-4 rounded" href="{{ route('project.index') }}">
    <i class="fas fa-arrow-left fa-fw text-blue-200 mr-1"></i> Back
  </a>
  <h3 class="tracking-wider font-medium text-gray-700 mt-4 mb-1 mr-auto">{{ $project->name }}</h3>
  <p class="tracking-wider text-sm text-gray-600 mr-auto">{{ $project->description }}</p>
</div>
<app-uploader
  accept="image/png, image/jpeg, image/jpg, image/webp, image/svg"
  action="{{ route('media.upload', $project) }}"
  endpoint="{{ route('project.media', $project) }}"
  token="{{ csrf_token() }}"
></app-uploader>
@endsection
