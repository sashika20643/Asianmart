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
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ $error }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
        @endforeach
        @if(session()->has('alert'))
        
     
        @if(session()->get('alert')==="exist")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Product exist!!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
        @else
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          successfully added..!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif
          @endif
  
      <div class="container-fluid pt-5 pb-3">
        
    
        <form action="/dash/subcat/add" method="post" enctype="multipart/form-data" class="pl-5 pr-5">
            {{csrf_field()}}
         
      
  <div class="form-group">
    <label for="Categery ">Categery </label>
    <select class="form-control" id="d_cat" name="categery">
      @foreach ($categeries as $item)
      @php ($i = 1)
      <option id= "{{"cat".$i++ }}" value="{{ $item->cat_id }}"> {{ $item->name }}
      @endforeach
      
     
    </select>
    </div>
    <div class="form-group">
        <label for="ProductName">Sub Categery Id</label>
        <input type="text" class="form-control" id="subcatid" name="subcat_id" aria-describedby="emailHelp" placeholder="Enter ID">
       
      </div>
    <div class="form-group">
        <label for="ProductName">Sub categery Name</label>
        <input type="text" class="form-control" id="subcatName" name="subcat_name" aria-describedby="emailHelp" placeholder="Enter Name">
       
      </div>


    
    <button type="submit" class="btn btn-primary">Create cetegery</button>
        </form>

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
   var element = document.getElementById("Subcat");
  element.classList.add("active");
</script>
<!--scripts-->
</body>
</html>