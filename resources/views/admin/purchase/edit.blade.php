@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Homework</h1>
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
                <div class="card-body">
                <div class="row">

                  <div class="form-group col-md-12">
                    <label >Program <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old ('program', $getRecord->program) }}"name="program" required placeholder="Program">
                    <div style="color:red">{{ $errors->first('program') }}</div>
                  </div>


                  <div class="form-group col-md-12">
                    <label >Course Code <span style="color: red;">*</span> </label>
                    <select class="form-control" required id="getClass"  name="class_id" >
                        <option value="">Select Course Code</option>
                        @foreach ($getClass as $class)
                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id}}">{{ $class->name}}</option>
                        @endforeach
                        <div style="color:red">{{ $errors->first('class_id') }}</div>
                    </select>
                    
                  </div>

                  <div class="form-group col-md-12">
                    <label >Section <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old ('section', $getRecord->section) }}"name="section" required placeholder="Program">
                    <div style="color:red">{{ $errors->first('section') }}</div>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Requirements<span style="color: red;">*</span></label>
                    <select class="form-control" required id="getRequirments" name="requirments">
                        <option value="">Select Requirements</option>
                        @foreach ($getRequirments as $requirment)
                            <option {{ ($getRecord->requirments == $requirment->id) ? 'selected' : '' }} value="{{ $requirment->id }}">{{ $requirment->name }}</option>
                        @endforeach
                        <div style="color:red">{{ $errors->first('requirments') }}</div>
                    </select>
                </div>
                

                  
                

                <div class="form-group col-md-12">
                  <label>Semester</label>
                  <select class="form-control" name="semester" required>
                      <option value="">Select Semester</option>
                      <option value="First sem." {{ old('semester', $getRecord->semester) == 'First sem.' ? 'selected' : '' }}>First Sem.</option>
                      <option value="Second sem." {{ old('semester', $getRecord->semester) == 'Second sem.' ? 'selected' : '' }}>Second Sem.</option>
                  </select>
              </div>
              

                 
                  <div class="form-group col-md-12">
                    <label>Document</label>
                    <input type="file" class="form-control" name="document_file" placeholder="Document">
                    @if(!empty($getRecord->getDocument()))
                    <a href="{{ $getRecord->getDocument() }}" class="btn btn-primary mt-2" target="_blank">View</a>
                  @endif
                    
                  </div>


                  <div class="form-group col-md-12">
                    <label>Description</label>
                  <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">{{ $getRecord->description }}</textarea>
                  </div>
               

                </div>
             
              </div>
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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

  });


</script>

@endsection