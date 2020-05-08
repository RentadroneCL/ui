@extends('default')

@section('content')
<a class="w-32 flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded" href="{{ route('project.index') }}">
  <i class="fas fa-arrow-left fa-fw text-blue-200 mr-1"></i> Back
</a>

<form action="{{ route('project.store') }}" method="POST" class="px-8 pt-6 pb-8 mb-4">
  @csrf
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
      Name
    </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Project name">
    <p class="text-red-500 text-xs italic"></p>
  </div>
  <div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
      Description
    </label>
    <textarea class="w-full h-24 shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="Project description"></textarea>
    <p class="text-red-500 text-xs italic"></p>
  </div>
  <div class="flex items-center justify-between">
    <button class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Save
    </button>
  </div>
</form>
@endsection
