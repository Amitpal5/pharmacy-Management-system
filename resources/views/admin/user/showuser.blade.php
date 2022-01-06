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
            <h4>User List</h4>
            </div>
          



        <!-- /.modal-dialog -->
      </div>


</div>
                    


            <!-- /.card-header -->
           
 <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Passworrd</th>
                  <th>Show Password</th>
                  <th>Action</th>


                </tr>
                </thead>
                <tbody>
                  @php($i=1)
                  @foreach($user as $data)


                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                   <td>{{$data->password}}</td>
                  <td>{{$data->ppassword}}</td>
                 
                  <td>
                    <a href="{{url('admin/purchsing-marked',$data->id)}}" class="btn btn-danger">Delete</a>

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