<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>body{font-family: figtree,sans-serif;}</style>
    <title>Todo</title>
</head>
<body class="bg-gray-200 p-4">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-8">Todo list</h1>

        <div class="mb-6">
            <form action="" method="post" class="flex p-1">
                @csrf
                <input type="text" name="title" placeholder="The todo title" class="py-3 px-4 m-1 bg-gray-100 rounded-xl flex-1">
                <!-- <textarea name="description" class="py-3 px-4 bg-gray-100 rounded-xl"id="" cols="30" rows="10" placeholder="The todo description"></textarea> -->
                <button class="m-1 py-2 px-2 bg-blue-500 text-white rounded-xl">Add</button>
            </form>
        </div>

        <hr>

        <div class="mt-2">
            @foreach ($todos as $todo)
                <div 
                @class([
                    "py-4 flex items-center border-b border-gray-300 px-3",
                    $todo->isDone ? 'bg-green-200' : ""
                    ])
                    class=>


                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{$todo->title}}</h3>
                    </div>

                    <div class="flex space-x-3">
                        <form action="/{{$todo->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                <p class="">Done</p>
                            </button>
                        </form>
                        <form action="/{{$todo->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                <p class="">Delete</p>
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    
</body>
</html>