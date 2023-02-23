<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-4">
        <h3 class="py-2">Update Post</h3>
        <form method="post" action="{{ url('/posts/update') }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description">{{ $post->description }}</textarea>
            </div>
            <input type="hidden" name="id" value="{{ $post->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
