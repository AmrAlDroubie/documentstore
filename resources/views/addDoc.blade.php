<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document Center</title>
  <link rel="stylesheet" href="{{ url('/css/bootstrap.rtl.min.css') }}" />
  <link rel="stylesheet" href="{{ url('/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ url('/css/style.css') }}" />
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-primary text-white">
                <h3 class="card-title text-center">رفع وثيقة</h3>
              </div>
              <div class="card-body">
                <form action="{{url('/docs/add')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                  <!-- Select Dropdown -->
                  <div class="mb-3">
                    <label for="selectOption" class="form-label">نوع الوثيقة</label>
                    <select class="form-select" name='doc-type' id="selectOption" aria-label="Select an option">
                      {{-- @foreach ($types as $type)
                        <option value="{{$type->value}}">{{$type->name}}</option>
                      @endforeach --}}
                    </select>
                  </div>
    
                  <!-- File Upload -->
                  <div class="mb-3">
                    <label for="fileUpload" class="form-label">رفع وثيقة</label>
                    <input class="form-control" name='doc-file' type="file" id="fileUpload">
                  </div>
    
                  <!-- Textarea -->
                  <div class="mb-3">
                    <label for="textareaField" class="form-label">معلومات اضافية</label>
                    <textarea class="form-control" name='doc-desc' id="textareaField" rows="4" placeholder="ادخل المعلومات"></textarea>
                  </div>
    
                  <!-- Submit Button -->
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">رفع</button>
                  </div>
                  <span>
                    @isset($msg)
                        <span class='text-danger fs-6'>{{$msg}}</span>
                    @endisset
                  </span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

  <script src="{{ url('/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('/js/script.js') }}"></script>
</body>

</html>