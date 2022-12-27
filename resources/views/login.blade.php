<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-success text-center">
    @if(isset($error))
        <h4>{{$error}}</h4>
    @endif
    <h1 class="text-white my-4">صفحه ورود</h1>
    <hr class="border">
    <div class="container w-50 m-auto">
        <form action="{{route('login.submit')}}" method="post" class="d-flex flex-column form-group">
            <div class="d-flex flex-column text-center fs-2 text-white mt-2">
                <label for="" class="my-2">نام کاربری</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="d-flex flex-column text-center fs-2 text-white mt-2">
                <label for="" class="my-2">رمز ورود</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="mt-2">
                @csrf
                <button type="submit" class="btn btn-primary form-control mt-2">ورود</button>
            </div>
        </form>
    </div>
</body>
</html>