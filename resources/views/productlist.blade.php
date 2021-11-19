<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Asianmart-dash</title>
  @include('components.header')
<!-- links -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('components.navbar')
  <!-- Navbar -->
  
  <!-- /.navbar -->
  @include('components.header')
 
  <!-- Main Sidebar Container -->
  @include('components.sidebar')

<div class="content-wrapper">
  
    <div class="content">
      <div class="container-fluid">
        


      </div>
    </div>
    <!-- /.content -->
  </div>
   @include('components.controllsidebar')
  <!-- /.control-sidebar -->
  @include('components.footer')
  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('components.scripts')
<script>
   var element = document.getElementById("Olist");
  element.classList.add("active");
</script>
<!--scripts-->
</body>
</html>