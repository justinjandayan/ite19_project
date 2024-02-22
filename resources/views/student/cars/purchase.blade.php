@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Cars</h1>
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
                    <label class="form-label">Car VIN</label>
                    <input type="text" class="form-control" value="{{ $getRecord->vin }}"  name="vin" placeholder="Car VIN">
                    <div style="color:red">{{ $errors->first('vin') }}</div>
                </div>

            
                <div class="col-md-4 col-sm-12 mb-3">
                  <label class="form-label">Brands</label>
                  <input type="text" class="form-control" value="{{ $getRecord->brands }}"  name="brands" placeholder="Brands">
                  <div style="color:red">{{ $errors->first('brands') }}</div>
              </div>
            
              <div class="col-md-4 col-sm-12 mb-3">
                <label class="form-label">Models</label>
                <input type="text" class="form-control" value="{{ $getRecord->models }}"  name="models" placeholder="Models">
                <div style="color:red">{{ $errors->first('models') }}</div>
            </div>
            
                <div class="col-md-3 col-sm-12 mb-3">
                    <label class="form-label">Color of car</label>
                    <select class="form-control" name="color" id="color"
                        value="{{ old('color') }}">
                        <option {{ (old('color', $getRecord->color) == 'black') ? 'selected' : ''}} value="black">Black</option>
                        <option {{ (old('color', $getRecord->color) == 'white') ? 'selected' : ''}} value="white">White</option>
                        <option {{ (old('color', $getRecord->color) == 'red') ? 'selected' : ''}} value="red">Red</option>
                        <option {{ (old('color', $getRecord->color) == 'blue') ? 'selected' : ''}} value="blue">Blue</option>
                        <option {{ (old('color', $getRecord->color) == 'green') ? 'selected' : ''}} value="green">Green</option>
                        <option {{ (old('color', $getRecord->color) == 'yellow') ? 'selected' : ''}} value="yellow">Yellow</option>
                        <option {{ (old('color', $getRecord->color) == 'orange') ? 'selected' : ''}} value="orange">Orange</option>
                        <option {{ (old('color', $getRecord->color) == 'purple') ? 'selected' : ''}} value="purple">Purple</option>
                        <option {{ (old('color', $getRecord->color) == 'ashen') ? 'selected' : ''}} value="ashen">Ashen</option>
                        <option {{ (old('color', $getRecord->color) == 'silver') ? 'selected' : ''}} value="silver">Silver</option>
                    </select>
                    <div style="color:red">{{ $errors->first('color') }}</div>
                </div>
            
                <div class="col-md-3 col-sm-12 mb-3">
                  <label class="form-label">Engine</label>
                  <input type="text" class="form-control" value="{{ $getRecord->engine }}"  name="engine" placeholder="Engine">
                  <div style="color:red">{{ $errors->first('engine') }}</div>
              </div>
            
              <div class="col-md-3 col-sm-12 mb-3">
                <label class="form-label">Transmission</label>
                <input type="text" class="form-control" value="{{ $getRecord->transmission }}"  name="transmission" placeholder="Transmission">
                <div style="color:red">{{ $errors->first('transmission') }}</div>
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
              <label class="form-label">Price</label>
              <input type="text" class="form-control" value="{{ $getRecord->price }}"  name="price" placeholder="Price">
              <div style="color:red">{{ $errors->first('price') }}</div>
          </div>


                
            
            <div class="col-md-12 col-sm-12 mb-3 d-flex justify-content-start align-items-center gap-4">
              <div class="col-5">
                @if(!empty($getRecord->getPhotoDirect()))
                      <img src="{{ $getRecord->getPhotoDirect() }}" style="width: auto;height: 250px;">
                    @endif
              </div>
            
          </div>

    
            
            </div>
            
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-shopping-cart"></i> Purchase
                  </button>
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