<!DOCTYPE html>
<html>
<head>
    <title>Edit Photo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-md w-96">
        <h2 class="text-xl font-bold mb-4">Edit Photo</h2>

        <img src="{{ asset('storage/'.$upload->filename) }}" class="mb-4 rounded shadow">

        <form action="{{ route('upload.update', $upload->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="file" name="photo" class="mb-4">
            @error('photo')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update
            </button>
        </form>
    </div>

</body>
</html>
