<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Photos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Uploaded Photos</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('upload.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Upload New Photo
        </a>

        <div class="grid grid-cols-3 gap-4 mt-6">
            @foreach($photos as $photo)
                <div class="bg-white p-4 rounded shadow text-center">
                    <img src="{{ asset('storage/'.$photo->filename) }}" class="w-full h-40 object-cover mb-2 rounded">

                    <div class="flex justify-center gap-2">
                        <a href="{{ route('upload.edit', $photo->id) }}"
                           class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('upload.destroy', $photo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
