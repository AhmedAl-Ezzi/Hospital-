<!doctype html>
<html lang="ar">

 @include('dashboard.layouts.header')

  <body class="vertical  light rtl ">
    <div class="wrapper">

    @include('dashboard.layouts.navbar')

    @include('dashboard.layouts.sidebar')


@yield('content')

    </div> <!-- .wrapper -->

@include('dashboard.layouts.scripts')




    {{-- <!-- البوشر --> --}}
    {{-- <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>

<script>
      // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5f04f07c01bf0eaa6723', {
      cluster: 'mt1'
    });

     var channel = pusher.subscribe('my-channel');
    // channel.bind('App\\Events\\MyEvent', function(data) {
    //   alert(JSON.stringify(data));
    // });

    channel.bind('my-event', function(data) {
  alert(JSON.stringify(data.patient_id));
});

</script> --}}



  </body>
</html>
