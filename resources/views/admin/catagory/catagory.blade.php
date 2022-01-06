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
            <h4>Catagory</h4>
            </div>
          <div class="col-sm-4 p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                  Add a Catagory
                </button>
          </div>




       <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a Catagory</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{route('admin.addcatagory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Catagory ID</label>
                                     @php($i=rand(1000,5000))

                    <input type="text" class="form-control" name="id" id="exampleInputPassword1" value="CA{{$i}}">
                    @error('id')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Catagory Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Enter Catagory Name">
                    @error('name')
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
                  <th>Catagory ID</th>
                  <th>Catagory Name</th>
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                  @php($i=1)
                  @foreach($catagory as $data)


                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->catagory_id}}</td>
                  <td>{{$data->name}}</td>
                  <td>
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    <div id="edit{{$data->id}}" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Catagory Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <form action="{{route('admin.updatecatagory')}}" method="post" enctype="multipart/form-data">
        @csrf

              <div class="modal-body pd-10">
              
        <input type="hidden" name="id" value="{{$data->id}}" >

          <div class="row">
                   
 <div class="col-md-12">
        <div class="form-group">
    <label for="exampleInputEmail1">Catagory Name:</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->name}}">
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
                    
 <a href="{{url('delete/catagory',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>


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