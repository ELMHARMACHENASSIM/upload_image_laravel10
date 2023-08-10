<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>upload image</title>
</head>
<body>
    <form action={{route('images.store')}} method="POST" enctype="multipart/form-data">
        @csrf
    <input type="file" name="imageupload" id="imageupload" required>
    <button type="submit">upload</button>
</form>
<div class="divimg">
@foreach ($images as $image)
<div class="image">
    <img src={{ asset('imagesfile/'.$image->imageupload)}} alt="" width='200'>
    <a href="{{ asset('imagesfile/'.$image->imageupload)}}" download="{{$image->imageupload}}">download</a>
</div>
@endforeach
</div>
</body>
</html>
