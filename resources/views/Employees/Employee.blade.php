@extends('layouts.master')
@section('css')

<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">

<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">




@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Employees</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    
                <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">New Employee</a>
    
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
   
<div class="card-body">
								
                             
 

   

    <table id ='mydatatable' class="table table-bordered data-table">

        <thead>

            <tr>

                
                <th>ID</th>							
                <th>FullName</th>
               <th>Salary</th>  
                <th>Image</th>                     
                <th>Action</th>                    
                <th>created-by</th>
                <th>Department</th>
            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

</div>

</div>
</div>
</div>

    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">New Employee</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id='AddForm' enctype="multipart/form-data">
                        {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name ="first_name" id="first_name" placeholder="first_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name ="last_name" id="last_name" placeholder="last_name">
                                </div>                

                                <div class="form-group">
                                    <input type="text" class="form-control" name ="salary" id="salary" placeholder="salary" 
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> 
                                </div>
                                <div class="form-group">
                                <input type="file" name="image" class="dropify" accept=".pdf,.jpg, .JPG , .png, image/jpeg, image/png"
                                data-height="70" />
                                </div>

                                
                            <label class="form-label">Department name</label>
                            <select name="DepartmentId" id="select-name" class="form-control">
                                <option value="0">--Select--</option>
                                @foreach ($departments as $item)
                                    <option value='{{$item->id}}'>{{$item->name}}</option>
                                @endforeach
                            </select>
                                                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" id='newemployee'>Save changes</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
                    </form>
            </div>
        </div>
    </div>


    
 <!-- edit -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">

             <form id='updateempo' autocomplete="off">
             {{method_field('patch')}}    
             {{ csrf_field() }}
                 <div class="form-group">
                     <input type="hidden" name="id" id="id" value="">
                     <label for="recipient-name" class="col-form-label">First Name</label>
                     <input class="form-control" name="first_name" id="first_name" type="text">
                 </div>
                 <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Last Name</label>
                     <input class="form-control" name="last_name" id="last_name" type="text">
                 </div>
                 <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Salary</label>
                     <input class="form-control" name="salary" id="salary" type="text">
                 </div>

                 <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Image</label>
                     <input class="form-control" name="image" id="image" type="text">
                 </div>
                 <label class="form-label">Department name</label>
                 <select name="DepartmentId" id="select-name2" class="form-control">
                     @foreach ($departments as $item)
                         <option value='{{$item->id}}'>{{$item->name}}</option>
                     @endforeach
                 </select>

         </div>
         <div class="modal-footer">
             <button type="submit" class="btn btn-primary">submit</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
         </div>
         </form>
     </div>
 </div>
</div>

<!-- delete -->
<div class="modal" id="modaldemo9">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content modal-content-demo">
         <div class="modal-header">
             <h6 class="modal-title">Delete Employee</h6><button aria-label="Close" class="close" data-dismiss="modal"
                 type="button"><span aria-hidden="true">&times;</span></button>
         </div>
         <form id='deleteEmp'>
         {{ csrf_field() }}
        
         {{ method_field('DELETE') }}
             <div class="modal-body">
                 <input type="hidden" name="id" id="id" value="">
                 <input class="form-control" name="fullname" id="fullname" type="text" readonly>
             
             
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                 <button type="submit" class="btn btn-danger">Delete</button>
             </div>
     </div>
     </form>
 </div>
</div>
    @endsection
@section('js')

<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>


<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
<!--Internal  Datatable js -->

<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script>
$(function () {
    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('Employee.display') }}",
        columns: [
          { data: 'id', name: 'id'},
          {data: 'fullname', name: 'fullname'},
          

          {data: 'salary', name: 'salary'},
          {data: 'image', name: 'image'},
          {data: 'action', name: 'action'},
          {data: 'mangername', name: 'created-by'},
          {data: 'department' , name: 'department'} 
        ] , 
        drawCallback: function(e) {
         
        console.log(e);
      }
    });
  
      
  });

</script>
<script>
    $('#AddForm').submit(function(e){
      //  var _token = $("input[name='_token']").val();
        e.preventDefault();
		
        var formData = new FormData(this);
		console.log(formData);
        $.ajax({
			type:'post',
			url : "{{route('Employee.store')}}",
			data:formData,
			processData: false,
			contentType: false,
            success: function(data) {
            console.log(data.error)
            if($.isEmptyObject(data.error)){
                alert(data.success);
                $('.data-table').DataTable().ajax.reload();
            }
            else{
                console.log('error######');
                console.log(data.succ);
            }
        }
		})

    });

</script>


<script>
    
    $("#deleteEmp").on( "submit", function(e) {

        
    e.preventDefault();
    
    var _token = $("#deleteEmp input[name='_token']").val();
    var _method= $("#deleteEmp input[name='_method']").val();
    var id = $("#deleteEmp input[name='id']").val();
    console.log(id);
    console.log(_method);
    console.log(_token);
    
    $.ajax({
        type:'POST',
        url : "Employee/destroy",
        data :{
            _token:_token,
            _method:_method,
            id:id
        },
        success:function(data){
            console.log(data.error);
            if($.isEmptyObject(data.error)){
                alert(data.success);
                $('.data-table').DataTable().ajax.reload();
            }
            else{
                console.log('error######');
                console.log(data.succ);
            }
        }
    })

    });
    
    
</script>

<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var first_name = button.data('first_name');
        var last_name = button.data('last_name');        
        var salary = button.data('salary');        
        var image = button.data('image');      
        var Departemnt =  button.data('department');  
        //  var s_id= button.data('section_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #first_name').val(first_name);
        modal.find('.modal-body #last_name').val(last_name);
        modal.find('.modal-body #salary').val(salary);
        modal.find('.modal-body #image').val(image);
        modal.find('.modal-body #select-name2').val(Departemnt);
        
        console.log(button);
   
    });
</script>




<script>

    $("#updateempo").on( "submit", function(e) {
        e.preventDefault();
        var _method = $("#updateempo input[name='_method']").val();
        var _token = $("#updateempo input[name='_token']").val();
        var id = $("#updateempo input[name='id']").val();
        var first_name = $("#updateempo input[name='first_name']").val();
        var last_name = $("#updateempo input[name='last_name']").val();
        
        var salary = $("#updateempo input[name='salary']").val();
        var image = $("#updateempo input[name='image']").val();
        $.ajax({
            type:'POST',
            url : 'Employee/update',
            data:{
                 _token:_token ,
                 _method:_method,
                 id: id, 
                 first_name : first_name ,
                 last_name:last_name,
                 salary:salary ,
                 image:image ,
               },
            success: function(data) {
                console.log(data.error)
                if($.isEmptyObject(data.error)){
                    alert(data.success);
                    $('.data-table').DataTable().ajax.reload();
                }
                else{
                    console.log('error######');
                    console.log(data.succ);
                }
            }
    
        })
    });
    
    </script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var first_name = button.data('first_name');
        var last_name = button.data('last_name');
        
        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #fullname').val(first_name+last_name);
//modal.find('.modal-body #last_name').val(partno);
        console.log(button);
    
    });
</script>

@endsection