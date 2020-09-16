<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="row">
          <div class="col-md-2">
              <label for="">Enter name</label>
              <input type="text" placeholder="Enter name" class="form-control form-control-sm" name="name"  id="name" value="">
              <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
          </div>
          <div class="col-md-2">
              <label for="">Enter Cost</label>
              <input type="number" placeholder="Enter name" class="form-control form-control-sm" name="cost"  id="cost" value="">
              <font style="color:red"> {{ $errors->has('cost') ?  $errors->first('cost') : '' }} </font>
          </div>
          <div class="col-md-2" style="margin-top:26px;">
              <button id="addMore" class="btn btn-success btn-sm">Add More </button>
          </div>
       </div>
       <div class="row" style="margin-top:26px;">
      <div class="col-md-5">
  
  
    <form action="{{ route('task.store') }}" method="post">
      @csrf
      
      <table class="table table-sm table-bordered" style="display: none;">
      <thead>
          <tr>
              <th>Name</th>
              <th>Cost</th>
              <th>Action</th>
          </tr>
      </thead>
  
      <tbody id="addRow" class="addRow">
  
      </tbody>
      <tbody>
        {{-- <tr>
          <td colspan="1" class="text-right">
              <strong>Total:</strong> 
          </td>
          <td>
              <input type="number" id="estimated_ammount" class="estimated_ammount" value="0" readonly>
          </td>
        </tr> --}}
      </tbody>
  
      </table>
     <button type="submit" class="btn btn-success btn-sm">Submit</button>
    </form>

    <div class="table-responsive mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->cost }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
      </div>
    </div>
  </div>
  
  
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script> 
  
  <script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
  
        <td>
          <input type="text" name="name[]" value="@{{ name }}">
        </td>
        <td>
          <input type="number" class="cost" name="cost[]" value="@{{ cost }}">
        </td>
    
        <td>
         <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
        </td>
  
    </tr>
   </script>
  
  <script type="text/javascript">
   
   $(document).on('click','#addMore',function(){
      
       $('.table').show();
  
       var name = $("#name").val();
       var cost = $("#cost").val();
       var source = $("#document-template").html();
       var template = Handlebars.compile(source);
  
       var data = {
          name: name,
          cost: cost
       }
  
       var html = template(data);
       $("#addRow").append(html)
     
    //    total_ammount_price();
   });
  
    $(document).on('click','.removeaddmore',function(event){
      $(this).closest('.delete_add_more_item').remove();
    //   total_ammount_price();
    });
  
    // function total_ammount_price() {
    //   var sum = 0;
    //   $('.cost').each(function(){
    //     var value = $(this).val();
    //     if(value.length != 0)
    //     {
    //       sum += parseFloat(value);
    //     }
    //   });
    //   $('#estimated_ammount').val(sum);
    // }
                         
  </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>