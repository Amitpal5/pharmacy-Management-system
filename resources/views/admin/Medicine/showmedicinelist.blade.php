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
	            <h4>Medicine List</h4>
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
	                  <th>Medicine Name</th>
	                  <th>Medicine Genius</th>
	                  <th>Company Name</th>
	                  <th>Catagory</th>
	                  <th>Strenght</th>
	                  <th>Buying Price</th>
	                   <th>Selling Price</th>
	                   <th>Action</th>


	                </tr>
	                </thead>
	                <tbody>
	                  @php($i=1)
	                  @foreach($medicine as $data)


	                <tr>
	                  <td>{{$i++}}</td>
	                  <td>{{$data->medicine_name}}</td>
	                  <td>{{$data->medicine_genius}}</td>
	                   <td>{{$data->company_name}}</td>
	                  <td>{{$data->catagory_name}}</td>
	                  <td>{{$data->strenght}}</td>
	                  <td>{{$data->buying_price}}</td>
	                  <td>{{$data->selling_price}}</td>
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
	        <form action="{{route('admin.updatemedicine')}}" method="post" enctype="multipart/form-data">
	        @csrf

	              <div class="modal-body pd-10">
	              
	        <input type="hidden" name="id" value="{{$data->id}}" >

	          <div class="row">
	                   
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Medicine Name:</label>
	    <input type="text" name="medicine_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->medicine_name}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Medicine Genius:</label>
	    <input type="text" name="medicine_genius" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->medicine_genius}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Company Name:</label>
	    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->company_name}}">
	 @error('company_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Catagory Name:</label>
	    <input type="text" name="catagory_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->catagory_name}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Strenght:</label>
	    <input type="text" name="strenght" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->strenght}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Buying Price:</label>
	    <input type="text" name="buying_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->buying_price}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Selling Price:</label>
	    <input type="text" name="selling_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->selling_price}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Minimun Stock:</label>
	    <input type="text" name="minimun_stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->minimun_stock}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Expire Date:</label>
	    <input type="text" name="expire_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->expire_date}}">
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
	                    
	 <a href="{{url('delete/medicine',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>






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