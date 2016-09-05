<!DOCTYPE html>
<html lang="len">
<head>
    <meta charset="utf-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title>Laravel CRUD with VUEjs</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"></link>
</head>
<body>
<div class="container">
    @yield('content')
</div>
<script src="assets/js/vendor.js"></script>
      @stack('scripts')
</body>
</html>
