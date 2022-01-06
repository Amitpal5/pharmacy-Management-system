@extends('admin.admin_layouts')

@section('admin.content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add A Medicine</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Medicine</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add a Medicine</h3>

           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	 <form role="form" action="{{route('admin.addmedicine')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                @php
                
               $catagory=DB::table('catagories')->get();

                @endphp	
                  <label>Catagory</label>
                  <select class="form-control select2" name="catagory_name" style="width: 100%;">
                    <option value="">Select Catagory</option>
                    @foreach($catagory as $data)
                    <option value="{{$data->name}}">{{$data->name}}</option>

                    @endforeach
                    
                  </select>
                  @error('catagory_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
               
                  <label>Company Name</label>
                  <input type="text" class="form-control" name="company_name" value="" placeholder="Enter Company Name">
                  @error('company_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
           <div class="col-md-6">
                <div class="form-group">
               
                  <label>Medicine Name</label>
                  <input type="text" class="form-control" name="medicine_name" value="" placeholder="Enter Medicine Name">
                  @error('medicine_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
               
                  <label>Medicine Genius</label>
                  <input type="text" class="form-control" name="medicine_genius" value="" placeholder="Enter Medicine Genius">
                   @error('medicine_genius')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
               <div class="col-md-6">
                <div class="form-group">
               
                  <label>Strenght</label>
                  <input type="text" class="form-control" name="strenght" value="" placeholder="Enter Medicine Strenght">
                   @error('strenght')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
              <div class="col-md-6">
                <div class="form-group">
               
                  <label>Buying Price</label>
                  <input type="text" class="form-control" name="buying_price" value="" placeholder="Enter Medicine Buying Price">
                   @error('buying_price')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
               
                  <label>Selling Price</label>
                  <input type="text" class="form-control" name="selling_price" value="" placeholder="Enter Medicine Selling Price">
                   @error('selling_price')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
           
           <div class="col-md-6">
                <div class="form-group">
               
                  <label>Minimun Stock</label>
                  <input type="text" class="form-control" name="minimun_stock" value="" placeholder="Enter Medicine Minimun Stock">
                   @error('minimun_stock')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
               
                  <label>Expire Date</label>
                  <input type="text" class="form-control" name="expire_date" value="" placeholder="Enter Medicine Expire Date">
                   @error('selling_price')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>


         
       
           <div class="card-footer">
                  <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
        
              </div>

                <!-- /.form-group -->
               </form>
             
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>














@endsection