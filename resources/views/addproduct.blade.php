<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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

      <div class="container-fluid pt-2 pb-3">
          <h1 class="mt-2" style="text-align:center; color:blue; text-decoration:underline">Add  New Product</h1>
       
       
          <form action="/dash/product/add" method="post" enctype="multipart/form-data" class="pl-5 pr-5">
        {{csrf_field()}}
          <div class="form-group">
    <label for="ProductName">Product Name</label>
    <input type="text" class="form-control" id="ProductName" name="product_name" aria-describedby="emailHelp" placeholder="Enter Name">
   
  </div>
  <div class="form-group">
    <label for="ProductId">Product Id</label>
    <input type="text" class="form-control" id="ProductId" name="product_id" placeholder="Product Id">
  </div>

  <div class="form-group">
    <label for="Description">Description</label>
    <textarea class="form-control" id="Description" name="product_description" rows="3" placeholder="Description"></textarea>
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="Product image" name="product_image" placeholder="Product image.jpg">
  </div>

  <div class="form-group">
    <label for="VideoLink1">Video Link 1(product video)</label>
    <input type="link" class="form-control" id="Vlink1" name="Video_link1" placeholder="Video Link 1">
  </div>

  <div class="form-group">
    <label for="VideoLink2">Video Link 2(How To Coock)</label>
    <input type="link" class="form-control" id="Vlink2" name="Video_link2" placeholder="Video Link 2">
  </div>

  
  <div class="form-group">
    <label for="price">Product Price</label>
    <input type="text" class="form-control" id="p_price" name="product_price" placeholder="Product Price">
  </div>

  <div class="form-group">
    <label for="Discount">Product Discount</label>
    <br>
    <input type="text" class="form-control" id="p_discount" name="product_discount" placeholder="Product Discount" style="display:inline; width:68%">
    <select class="form-control" id="d_type" name="d_type"  style="display:inline ;width:30%">
      <option>Rs</option>
      <option>%</option>
     
    </select>
  </div>

  <div class="form-group">
    <label for="Quantity">Product Quantity</label>
    <input type="text" class="form-control" id="p_quantity" name="product_quantity" placeholder="Product Quantity" style="width:50%">
  </div>

  <div class="form-group">
    <label for="Categery ">Categery </label>
    <select class="form-control" id="d_cat" name="categery">
      @foreach ($categeries as $item)
      @php ($i = 1)
      <option id= "{{"cat".$i++ }}" value="{{ $item->cat_id }}"> {{ $item->name }}
      @endforeach
      {{-- <option>vegetable</option>
      <option>Fish & meat</option>
      <option>Spices</option>
      <option>Readymade food</option>
      <option>Dried food</option>
      <option>Rice and grain</option>
      <option>Milk powder & Drink</option>
      <option>Grocery items</option>
      <option>Biscuits</option>
      <option>Others</option> --}}
     
    </select>
    </div>

    <div class="form-group">
    <label for="Subcategery">Sub Categery </label>
    <select class="form-control" id="s_cat" name="s_cat">
      <option value="cat001scat000">No Categery</option>
      
    </select>
  </div>

  <div class="form-group">
    <label for="Status">Status </label>
    <select class="form-control" id="status" name="status">
      <option >Active</option>
      <option >Draft</option>

      
    </select>
  </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
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
   var element = document.getElementById("Add");
  element.classList.add("active");
  var activities = document.getElementById("d_cat");
  activities.addEventListener("change", function() {
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    
              $.ajax({
               type:'POST',
               url:"{{url('/dash/subcatselect')}}",
                data:{cat_id: activities.value,
               

               },
              
               }).done(function(data) {
                var comp = document.getElementById("s_cat");
                data.forEach(element => {
                  var s="<option value='"+element.subcat_id+"'>"+element.subcatname+"</option>";
                  comp.innerHTML+=s;
                });
             
              
                    console.log(data);
                

               }).fail(function (data, textStatus, errorThrown) {
        console.log(textStatus);
        });

    



  })
</script>
<!--scripts-->
</body>
</html>