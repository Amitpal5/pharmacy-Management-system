@extends('admin.admin_layouts')

@section('admin.content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add A User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
            <h3 class="card-title">Add a User</h3>

           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	 <form role="form" action="{{route('admin.adduser')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">

              
            <div class="col-md-6">
                <div class="form-group">
               
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="" placeholder="Enter User Name">
                  @error('name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
           <div class="col-md-6">
                <div class="form-group">
               
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="" placeholder="Enter User Email">
                  @error('email')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
               
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" value="" placeholder="Enter User Password">
                   @error('password')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                
                  <label>User Type</label>
                  <select class="form-control select2" name="type" style="width: 100%;">
                    <option value="">Select User Type</option>
                    <option value="0">Salesman</option>

                    
                  </select>
                  @error('type')
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