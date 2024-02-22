@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Parts</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
           
            <div class="card card-primary">
              
             
              <form method="post" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-4 col-sm-12 mb-3">
                    <label class="form-label">Parts Name </label>
                    <input type="text" class="form-control" value="{{ old('parts_name') }}" name="parts_name" placeholder="Parts Name">
                    <div style="color:red">{{ $errors->first('parts_name') }}</div>
                </div>

            
                <div class="col-md-4 col-sm-12 mb-3">
                  <label class="form-label">Price</label>
                  <input type="number" class="form-control" value="{{ old('price') }}" name="price" placeholder="Price">
                  <div style="color:red">{{ $errors->first('price') }}</div>
              </div>
            
              <div class="col-md-4 col-sm-12 mb-3">
                <label class="form-label">Models</label>
                <select class="form-control" required id="getModel"  name="car_models" >
                  <option value="">Select Model</option>
                  @foreach ($getModel as $model)
                  <option value="{{ $model->id}}">{{ $model->models}}</option>
                  @endforeach
                  <div style="color:red">{{ $errors->first('class_id') }}</div>
              </select>
                <div style="color:red">{{ $errors->first('models') }}</div>
            </div>
                
            
            <div class="col-md-12 col-sm-12 mb-3 d-flex justify-content-start align-items-center gap-4">
              <div class="col-5">
                  <img src="{{ asset('dist/img/parts.png') }}" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar" />
              </div>
              <div class="button-wrapper">
                  <label for="photo">Photo</label>
                  <input type="file" class="form-control" name="photo" id="photo" onchange="previewImage(this)">
                  <p class="text-muted mb-0">Allowed JPG, GIF, or PNG. Max size of 800K</p>
                  <div style="color:red">{{ $errors->first('photo') }}</div>
                  <button type="button" class="btn btn-outline-secondary mt-2" onclick="resetImage()">Reset Image</button>
              </div>
          </div>

    
            
            </div>
            
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              
             </div>
         
          </div>
          
        </div>
        
</div>
    </section>
  
  </div>

  

@endsection

@section('script')


  <script src="{{ asset ('plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script type="text/javascript">

  $(function ()
  {
    $('#compose-textarea').summernote({
      height: 200
    });

    $('#getClass').change(function(){
      var class_id = $(this).val();
      $.ajax({
        type:"POST",
        url:"{{ url('teacher/ajax_get_subject') }}",
        data : {
          "_token": "{{ csrf_token() }}",
          class_id: class_id,
        },
        dataType: "json",
        success:function(data){
              $('#getSubject').html(data.success);
        }
      });
    });
  });


</script>

<script>
  function previewImage(input) {
      var fileInput = input;
      var imgElement = document.getElementById('uploadedAvatar');

      if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              imgElement.src = e.target.result;
          };

          reader.readAsDataURL(fileInput.files[0]);
      }
  }

  function resetImage() {
      var imgElement = document.getElementById('uploadedAvatar');
      var fileInput = document.getElementById('photo');

      // Reset the image to the default one
      imgElement.src = '{{ asset('dist/img/car.png') }}';

      // Reset the file input
      fileInput.value = '';
  }
</script>



@endsection