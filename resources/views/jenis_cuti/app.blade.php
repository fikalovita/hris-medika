<!DOCTYPE html>
<html lang="en">


@include('partials.header')

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>

@include('partials.sidebar')

@include('partials.navbar')

@include('jenis_cuti.content')
@vite('resources/js/datepicker.js')
@include('partials.footer')
@vite('resources/js/jenis_cuti.js')
</body>
</html>