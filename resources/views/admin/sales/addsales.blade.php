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




           <!-- /.card-header -->

           <div class="card-body">
             <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Invoice</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="" method="post">

                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-4">

                       <div class="form-group">
                        <label for="exampleInputEmail1">Customer:</label>
                        <input type="text" name="customer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Walking Customer" disabled="disabled">
                        @error('class_name')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror


                      </div>
                    </div>
                    <div class="col-md-4">

                     <div class="form-group">
                      <label for="exampleInputEmail1">Invoice:</label>

                      @php

                      $i=rand(1000,9990);


                      @endphp

                      <input type="text" name="invoice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$i}}" disabled="disabled">
                      @error('class_name')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror


                    </div>
                  </div>
                  <div class="col-md-4">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Date:</label>
                    <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('class_name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror


                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label for="lname" class="text-danger"> Product Name <span style="color: red"> *</span></label>
                    <div align="center">
                      <input type="text" name="search" id="tags" accesskey="A" class="form-control" placeholder="Enter Product Name / Product Code" autofocus="autofocus" autocomplete="off"/>
                    </div>

                  </div>

                  <div style="overflow-x:auto;">
                   <div id="productlist"></div>
                   {{ csrf_field() }}
                   <table class="table tbl table-bordered table-striped table-hover" id="receipt_bill">
                     <thead>
                      <tr>
                       <th><center>Item</center></th>
                       <th><center>Quantity</center></th>
                       <th><center>Price</center></th>
                       <th><center>Total</center></th>
                       <th><center>Action</center></th>
                     </tr>
                   </thead>

                   <tbody id="new">


                   </tbody>
                   <tr>
                     <td> </td>
                     <td> </td>
                     <td> </td>
                     <td class="text-right text-dark" >
                      <h5><strong>Sub Total:  TK </strong></h5>
                    </td>
                    <td class="text-center text-dark" >
                      <h5> <strong><span id="subTotal"></strong></h5>
                      </td>
                    </tr>
                  </table>

                </div>       
              </div>
              <div class="col-md-3">
                <table class="table table-bordered table-striped table-hover">

                  <thead>
                   <tr style="background-color: #2E4D62 ">
                    <th><span style="color:#fff; font-weight: bold">+</span><span style="color:#fff;"> Account</span>
                    </th>
                  </tr>
                  <tr>
                    <td>
                     <label style="font-size: 14px;">Discount</label><br>
                     <input type="text" name="discount_amount" class="form-control" oninput="" id="discount" autocomplete="off">
                   </td>
                 </tr>
                 <tr>
                  <td>
                   <label style="font-size: 14px;">Total Amount</label><br>
                   <input type="text" name="discount_amount" class="form-control" oninput="" id="discount" autocomplete="off">
                 </td>
               </tr>
               <tr>
                <td>
                 <label style="font-size: 14px;">Cash Received</label><br>
                 <input type="text" name="discount_amount" class="form-control"  id="discount" autocomplete="off">
               </td>
             </tr>
             <tr>
              <td>
               <label style="font-size: 14px;">Due Amount</label><br>
               <input type="text" name="discount_amount" class="form-control"  id="discount" autocomplete="off">
             </td>
           </tr>
           <tr>

             <td>
               <label style="font-size: 14px;">Payment Method</label><br>
               <select name="payment_method" id="payment_method" class="form-control"  style="width: 100%;">
                <option value="0">Cash in Hand</option>
                <option value="1">Bkash</option>
              </select>
            </td>
          </tr>
        </thead>
      </table>



    </div>









  </div>
  <input type="submit" class="btn btn-primary" name="" value="Submit">
</form>


<!-- /.card-body -->

</div> <!-- /.card --> <script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> $(document).ready(function(){

   $('#tags').keyup(function(){

    var a=$(this).val();
    if(a != ''){

      var _token=$('input[name="_token"]').val();
      $.ajax({

        url:"{{ route('autocomplete.fetch') }}",
        method:"POST",
        data:{a:a, _token:_token},
        success:function(data){

         $('#productlist').fadeIn();
         $('#productlist').html(data);

       }

     })

    }

  });

   $(document).on('click','li',function(){

     $('#productlist').fadeOut();


   })



 });

 $(document).on('click','.addcart',function(){
   var count = 1;


   var name = $(this).find('.name').val();
   var qty = $(this).find('.qty').val();
   var price = $(this).find('.price').val();

   if(name == 0)
   {
    var erroMsg =  '<span class="alert alert-danger ml-5">One Test Shoulb be added</span>';
    $('#errorMsg').html(erroMsg).fadeOut(9000);
  }
  else
  {
            billFunction(); // Below Function passing here 
            subtotal();
          }

          function billFunction()
          {
            var total = 0;

            $("#receipt_bill").each(function () {
              var total =  price*qty;
              var subTotal = 0;
              subTotal += parseInt(total);

              var table = '<tr><td><input type="hidden" name="name[]" id="total" value="'+name+'">'+ name + '</td><td><input type="text" name="qty[]" class="qty" id="qty" value="'+qty+'"></td><td><input type="hidden" class="price" name="price[]" id="price" value="'+price+'">' + price + '</td><input type="hidden" class="totalinput" name="total[]" value="'+total+'"><td class="total"  value="'+total+'">'+total+'</td></strong><td><a href="javascript:void(0)" class="btn btn-danger DeleteRow">-</a></td></tr>';



              $('#new').append(table)





              var Subtotal = $('#subTotal').text();


              var totalPayment = parseFloat(Subtotal);
              $('#totalPayment').text(totalPayment); // Showing using ID iggij


            });
            count++;
          } 

          function subtotal(){

           var arr = 0;

           var sum=0;
           $('.totalinput').each(function(){
          //var total=$(this).find('.total').val();

          arr+=parseInt($(this).val());


        });

           $('#subTotal').text(arr);
           





         }



       });



     </script>


     <script type="text/javascript">


      $(document).on('click','.DeleteRow', function(){

        $(this).parent().parent().remove();
        subtotal();




      });




      function subtotal(){

       var arr = 0;

       var sum=0;
       $('.total').each(function(){
        var total=$(this).find('.total').val();

        arr+=parseInt($(this).val());


      });

       $('#subTotal').text(arr);





     }


   </script>
   
   
   <script type="text/javascript">

    $(document).on('keyup','.qty', function(){


      var row = $(this).closest('tr');
      var qty = $('.qty', row),
      price = $('.price', row),
      total = $('.total', row);
      buy_pr = parseFloat(qty.val());
      sell_pr = parseFloat(price.val());

      if (!isNaN(buy_pr) && !isNaN(sell_pr)) {

        total.text((buy_pr*sell_pr).toFixed(2));
      }
      subtotal(); 



    });







    function subtotal(){

     var arr = 0;

     var sum=0;
     $('.total').each(function(){
          //var total=$(this).find('.total').val();

          arr+=parseInt($(this).val());


        });

     $('#subTotal').text(arr);
     console.log(arr);





   }


 </script>




















 @endsection