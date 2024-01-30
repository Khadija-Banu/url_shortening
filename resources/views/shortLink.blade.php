<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Short Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h2 class="text-center">Laravel - Create URL Short link </h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="mb-3 btn btn-primary">
                {{ __('Log Out') }}
            </button>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <form method="post" action="{{route('generate.shorten.link.post')}}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL">

                        <div class="input-group-addon">
                            <button class="btn btn-success">Generate Short Link</button>

                        </div>
                    </div>

                    @error('link')
                    <p class="m-0 p-0 text text-danger">{{$message}}</p>

                    @enderror
                </form>

            </div>

        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>short link</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shortLinks as $row )
                <tr>
                    <td>{{$row->id}}</td>
                    <td><a href="{{route('shorten.link',$row->code)}}" target="_blank">{{route('shorten.link',$row->code)}}</a></td>
                    <td>{{$row->link}}</td>
                </tr>

                @endforeach
            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>



{{-- Route::get('generate-shorten-link',[UrlShorteningController::class,'index']);
Route::post('generate-shorten-link',[UrlShorteningController::class,'store'])->name('generate.shorten.link.post');
Route::get('{code}',[UrlShorteningController::class,'shortLink'])->name('shorten.link'); --}}
