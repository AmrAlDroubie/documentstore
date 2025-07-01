<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Center</title>
    <link rel="stylesheet" href="{{ url('/css/bootstrap.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" />
</head>
<body>


    <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            @foreach ($docs as $doc)
            <div class="card doc-box">
              <img src="{{url('/docs/' . $doc->id)}}" class="card-img-top " alt="Sample Image">
              <div class="card-body">
              
                {{-- <h5 class="card-title">Card Title</h5> --}}
                
                <p class="card-text">
                  {{$doc->description}}
                </p>

              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    
    <div class="doc-box">

    </div>
        <div></div>
        <img src="" alt="">
  
    
</body>
</html>