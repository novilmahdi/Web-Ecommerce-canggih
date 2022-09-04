<div>
  <div class="page-content-wrapper">
  <div class="page-content-wrapper-inner">
    <div class="col-lg-12">
      <div class="grid">
        <p class="grid-header">Upload Laravel</p>
        <div class="grid-body">
          <div class="item-wrapper">
            <div class="row mb-3">
              <div class="col-md-8 mx-auto">
                <form id="upload-images"  wire:submit.prevent="storeProduct"  novalidate="novalidate" enctype="multipart/form-data">
                  
                  
                <div class="form-group row showcase_row_area" >
                  <div class="col-md-3 showcase_text_area">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                          {{ session('message') }}
                        </div>
                    @endif
                    <label for="inputType1">Judul</label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <input type="text" wire:model="title" class="form-control" placeholder="judul">
                    @error('title')<span class="text-danger">{{ $message }}</span> @enderror                 
                  </div>
                </div>
              

                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                    <label>File Upload</label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <div class="custom-file">
                      <input id="fileId" type="file" wire:model="images" style="padding: 3px; font-size: 12px;" class="form-control" id="exampleInputFile" multiple>
                    @error('images')<span class="text-danger">{{ $message }}</span> @enderror                 
                    </div>
                  </div>
                </div>

                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                    <label> Photo Preview</label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    @if ($images)
                    <div class="flex bg-blue-200 p-4 rounded-lg">
                      @if (is_array($images) || is_object($images))
                      @foreach ($images as $image )
                      <i class="fa fa-times text-danger mr-2"></i>
                        <img class="w-32 h-32 p-2 rounded-lg" src="{{ $image->temporaryUrl() }}">
                      @endforeach
                      @endif
                    </div>
                  @endif
                  </div>


                  
                  
                </div>
{{--               
                <div class="form-group row showcase_row_area" >
                  <div class="col-md-3 showcase_text_area">
                    <label for="inputType1">Preview</label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <div wire:loading wire:target="image">  
                      <div class="loader"></div>
                    </div>
                     @if($image)
                      <img src="{{ $image->temporaryUrl() }}" class="thumb-prev" alt="">
                    @endif 
                  
                  </div>
                </div> --}}
              
                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                  </div>
                    <div class="col-md-9 showcase_content_area">
                      <button type="submit"  id="btn-file-reset-id"  class="btn btn-success shdw">Save</button>
                  </div>
                  <p id="demo"></p>
                </div>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
  </div>
  </div>

  {{-- Reset value input file --}}
  <script>
    $(document).ready(function() {
        $('#btn-file-reset-id').on('click', function() {
            $('#fileId').val('');
          });
      });
  
  </script>
 