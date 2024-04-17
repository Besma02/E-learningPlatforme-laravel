<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form  action="{{route('admin.doLogin')}}" method="post">
       @csrf
        <div class="form-group m-4">
        <label class="form-label" for="form2Example1">Email address</label>
          <input type="email" name="email" class="form-control" />
          @error('email')
          <div class="text-red">{{$message}}</div>
           @enderror
        </div>
      
        <div class="form-group m-4">
         <label class="form-label" for="form2Example2">Password</label>
          <input type="password" name="password"  class="form-control" />
          @error('password')
          <div class="text-red">{{$message}}</div>
           @enderror
        </div>
             
        <button type="submit" class="btn btn-primary btn-block m-4">Login</button>
        </form>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>