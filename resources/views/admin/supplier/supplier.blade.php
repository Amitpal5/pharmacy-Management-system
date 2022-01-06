@extends('admin.admin_layouts')
@section('admin.content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content mt-4">
      <div class="row">
        <div class="col-12">
          
            <!-- /.card-header -->
            
          <!-- /.card -->

          <div class="card">
            <div class="container">

            <div class="row mb-10">
          <div class="col-sm-8 p-3">
            <h4>Supplier</h4>
            </div>
          <div class="col-sm-4 p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  Add a Supplier
                </button>
          </div>




       <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a Supplier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{route('admin.addsuppiler')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Name</label>
                    <input type="text" class="form-control" name="company_name" id="exampleInputPassword1" placeholder="Enter Company Name">
                    @error('company_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
                   
             <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Supplier ID</label>
                                     @php($i=rand(1000,9999))

                    <input type="text" class="form-control" name="id" id="exampleInputPassword1" value="SU{{$i}}">
                    @error('id')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Supplier Name</label>
                    <input type="text" class="form-control" name="suppiler_name" id="exampleInputPassword1" placeholder="Enter Supplier Name">
                    @error('suppiler_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Enter Phone">
                    @error('phone')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Email">
                    @error('email')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
                   
                  
                  
                  
              </div>
                 
                </div>
                <!-- /.card-body -->

                
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


</div>
                    </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>Sl No</th>
                  <th>Company Name</th>
                  <th>Supplier ID</th>
                   <th>Supplier Name</th>
                  <th>Phone</th>
                  
                  <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php($i=1)
                  @foreach($supplier as $data)


                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->company_name}}</td>
                  <td>{{$data->suppiler_id}}</td>
                  <td>{{$data->suppiler_name}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->email}}</td>
                  <td>
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    <div id="edit{{$data->id}}" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Supplier Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <form action="{{route('admin.updatesupplier')}}" method="post" enctype="multipart/form-data">
        @csrf

              <div class="modal-body pd-10">
              
        <input type="hidden" name="id" value="{{$data->id}}" >

          <div class="row">
                   
 <div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Company Name:</label>
    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->company_name}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>

<div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Supplier Name:</label>
    <input type="text" name="suppiler_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->suppiler_name}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
<div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Phone:</label>
    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->phone}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
<div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->email}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
</div>


     </div><!-- modal-body -->
              <div class="modal-footer">
               <input type="submit" class="btn btn-primary" value="UPDATE" />
        </form>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
                    
 <a href="{{url('delete/supplier',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>


                  </td>
                </tr>
               @endforeach
                
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(130)
        .height(130);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }



</script>
    
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>










       


@endsection