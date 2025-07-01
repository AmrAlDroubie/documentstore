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
  <div class="login-body">
    <div class="login-form">
      <h2 class="text-center mb-4">تسجيل دخول</h2>
      <form action="/login" method="POST">
        @csrf
        @method("post")
        <div class="mb-3">
          <label for="username" class="form-label">اسم المستخدم</label>
          <input type="text" class="form-control" id="username" name='username' placeholder="ادخل اسم المستخدم"
            required />
        </div>

        <!-- Password Field -->
        <div class="mb-3 position-relative">
          <label for="password" class="form-label">كلمة المرور</label>
          <input type="password" class="form-control" id="password" name='password' placeholder=" ادخل كلمة المرور"
            required />
          <span class="password-toggle" onclick="togglePassword()">
            <i class="fas fa-eye"></i>
          </span>
        </div>
        <button type="submit" class="btn btn-primary w-100">
          تسجيل دخول
        </button>
        @isset($msg)

        <span class='fs-6 text-danger'>
          {{$msg}}
        </span>

        @endisset
      </form>
    </div>
  </div>

  <script src="{{ url('/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('/js/script.js') }}"></script>
</body>

</html>