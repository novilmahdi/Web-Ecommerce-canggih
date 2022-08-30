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
                  <form wire:submit.prevent="save"  novalidate="novalidate" enctype="multipart/form-data">
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label>File Upload</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <div class="custom-file">
                        <input id="fileId" type="file" wire:model="image" class="form-control" id="exampleInputFile">
                      @error('image')<span class="text-danger">{{ $message }}</span> @enderror                 
                      </div>
                    </div>
                   
                  </div>
                
                  <div class="form-group row showcase_row_area" >
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType1">Preview</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <div wire:loading wire:target="image">  
                        <div class="loader"></div>
                      </div>
                       {{-- @if($image)
                        <img src="{{ $image->temporaryUrl() }}" class="thumb-prev" alt="">
                      @endif  --}}
                    
                    </div>
                  </div>
  
                 
  
                  <div class="form-group row showcase_row_area" >
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType1">Judul</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <input type="text" wire:model="title" class="form-control" placeholder="judul">
                      @error('title')<span class="text-danger">{{ $message }}</span> @enderror                 
                    </div>
                  </div>
                
  
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType9">Description</label>
                    </div>
                    <div class="col-md-9 showcase_content_area" wire:ignore>
                      <textarea  wire:model="description" class="form-control" rows="20" style="height:100%;" placeholder="Deskripsi...."></textarea>
                      @error('description')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>         
                  </div>
  
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType9">Code</label>
                    </div>
                    <div class="col-md-9 showcase_content_area" wire:ignore>
                      <textarea  wire:model="code" class="form-control" rows="20" style="height:100%;" placeholder="Code...."></textarea>
                      @error('code')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>         
                  </div>
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
   