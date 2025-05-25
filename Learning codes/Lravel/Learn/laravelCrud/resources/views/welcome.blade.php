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
    <title>Home</title>
</head>

<body>

    <div class="container">

        <div class="flex justify-between my-5">
            <h2 class="text-blue-500 text-xl font-bold">Home</h2>
            <a href="/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add New Post</a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652a1 1 0 010 1.414l-4.95 4.95 4.95 4.95a1 1 0 01-1.414 1.414l-4.95-4.95-4.95 4.95a1 1 0 01-1.414-1.414l4.95-4.95-4.95-4.95a1 1 0 011.414-1.414l4.95 4.95 4.95-4.95a1 1 0 011.414 0z" />
                </svg>
            </span>
        </div>
        @endif



        <div class="">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <!-- <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Id</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Description</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Image</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 min-w-full">
                                    @foreach($posts as $post)
                                    <tr class="odd:bg-white even:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $post->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->description }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="/images/{{ $post->image }}" width="80px"></td>
                                        <td>
                                            <a href="{{ route('edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        </td>

                                        <td>
                                            <a href="http://" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table> -->

                            <table class="min-w-full divide-y divide-gray-300 my-2">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">ID</th>
                                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Name</th>
                                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Description</th>
                                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Image</th>
                                        <th scope="col" class="py-3.5 px-3 text-center text-sm font-semibold text-gray-900">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($posts as $post)
                                    <tr class="hover:bg-gray-50">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">{{ $post->id }}</td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-700">{{ $post->name }}</td>
                                        <td class="py-4 px-3 text-sm text-gray-700 max-w-xs truncate">{{ $post->description }}</td>
                                        <td class="py-4 px-3 text-sm text-gray-700">
                                            <img src="/images/{{ $post->image }}" class="h-12 w-16 object-cover rounded" alt="{{ $post->name }}">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sm text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('edit', $post->id) }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Edit
                                                </a>
                                                <a href="{{ route('delete', $post->id) }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                   

                                </tbody>


                            </table>

                             {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>