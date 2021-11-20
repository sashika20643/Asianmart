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
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product ID</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
             
            </tr>
          </thead>
          <tbody>
            @php
                $i=1;    
                @endphp
            @foreach ($plist as $item)
                
            
            <tr>

              <th scope="row">{{ $i++ }}</th>
              <td>{{ $item->product_id }}</td>
              <td>{{ $item->name }}</td>
              <td>
                @if ($item->status==="Active")
                <a type="button" class="btn btn-success" href="/dash/product/status/draft/{{ $item->product_id }}"> {{ $item->status }}</a> 
                @else
                <a type="button" class="btn btn-secondary" href="/dash/product/status/active/{{ $item->product_id }}"> {{ $item->status }}</button> 
                @endif
                
              </td>
              <td>
                <a type="button" class="btn btn-warning" href="/dash/product/edit/{{ $item->product_id }}">Edit </a>
              </td>
              <td>
                <button type="button" class="btn btn-danger" onclick="Delete( '{{$item->product_id }}')">Delete </button>
              </td>
            </tr>
          
            @endforeach
          </tbody>
        </table>




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
   var element = document.getElementById("Plist");
  element.classList.add("active");
  function Delete(product_id){
    if(confirm("Do you need to delete this?")){
      window.location.href ="/dash/product/delete/"+product_id;
    }
  }

</script>
<!--scripts-->
</body>
</html>