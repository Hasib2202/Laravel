<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
      .container{
        @apply px-10 mx-auto;
      }
    }
  </style>
    <title>Create</title>
</head>

<body>

    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-blue-500 text-xl font-bold">Create</h2>
            <a href="/" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back Home</a>
        </div>

        <!-- @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
            <strong class="font-bold">Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652a1 1 0 010 1.414l-4.95 4.95 4.95 4.95a1 1 0 01-1.414 1.414l-4.95-4.95-4.95 4.95a1 1 0 01-1.414-1.414l4.95-4.95-4.95-4.95a1 1 0 011.414-1.414l4.95 4.95 4.95-4.95a1 1 0 011.414 0z" />
                </svg>
            </span>
        </div>
        @endif -->

        <div>
            <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="border border-gray-300 rounded p-2" placeholder="Enter your name" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <label for="description">Description</label>
                    <input name="description" class="border border-gray-300 rounded p-2" placeholder="Enter description" value="{{ old('description') }}"></input>
                    @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <label for="image">Image</label>
                    <input type="file" name="image" class="border border-gray-300 rounded p-2" placeholder="Enter image url" value="{{ old('image') }}">
                    @error('image')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <input type="submit" value="Create Post" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                </div>

            </form>
        </div>

    </div>

</body>

</html>