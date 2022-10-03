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
                <form id="upload-images"  wire:submit.prevent="updateProduct"  novalidate="novalidate" enctype="multipart/form-data">      
                  
              <div class="form-group row showcase_row_area" >
                <div class="col-md-3 showcase_text_area">
                <label for="inputType1">Nama barang</label>
                </div>
                <div class="col-md-9 showcase_content_area">
                <input type="text" wire:model="nama_barang" class="form-control" placeholder="judul">
                @error('nama_barang')<span class="text-danger">{{ $message }}</span> @enderror                 
                </div>
            </div>


                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label>Upload Preview</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <div class="custom-file">
                        <input id="fileId" type="file" wire:model="images_preview"  onchange="loadPreview(this);" style="padding: 3px; font-size: 12px;" class="form-control">
                      @error('images_preview')<span class="text-danger">{{ $message }}</span> @enderror                 
                      </div>
                    </div>
                  </div>
  
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area" colspan="12" style="text-align: center;">
                     <div class="image-tampilan"><label></label></div>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <div wire:loading wire:target="images_preview">
                        <div class="loader"></div>
                     </div>
                     <div class="flex bg-blue-200 p-4 rounded-lg">
                      {{-- @if ($images_preview)
                      Photo Preview:
                      <img src="{{ $images_preview->temporaryUrl() }}">
                  @endif --}}
                  
                  <div wire:ignore>
                  @foreach ($ProductImagesPreview as $testP)
                      
                    <img class="w-32 h-32 p-2 rounded-lg" id="preview_img" src="{{ asset("uploads/".$testP->image_preview) }}">
                    @endforeach
                    
                  </div>
                    </div>
                  </div>
                  </div>
                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                    <label>Gambar Multiple</label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <div class="custom-file">
                      <input id="fileId" type="file" wire:model="images" onchange="loadPreview2(this);" style="padding: 3px; font-size: 12px;" class="form-control" id="exampleInputFile" multiple>
                      @error('images')<span class="text-danger">{{ $message }}</span> @enderror                 
                    </div>
                  </div>
                </div>
                
                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                    <label> </label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <div wire:loading wire:target="images">
                      <div class="loader"></div>
                    </div>
                    
                    @if(session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                     <div class="flex bg-blue-200 p-4 rounded-lg">
                          {{-- @if ($images_preview)
                      Photo Preview:
                      <img src="{{ $images_preview->temporaryUrl() }}">
                  @endif --}}
                  
                  
                    @foreach ($ProductImages as $image )
                    
                    {{-- <div wire:ignore> --}}
                    <a href="#" wire:click.prevent="deleteImage({{ $image->id }})"> <i class="fa fa-times text-danger mr-2"></i>
                      <img class="w-32 h-32 p-2 rounded-lg" id="preview_img2" src="{{ asset('uploads/all') }}/{{ $image->image }}">
                      </a>
                    {{-- </div> --}}
                      @endforeach
                     
                    </div>
                  </div>                            
                </div>

          


              <div class="form-group row showcase_row_area" >
                  <div class="col-md-3 showcase_text_area">
                  <label for="inputType1">Harga</label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                  <input type="number" wire:model="harga" class="form-control" placeholder="harga">
                  @error('harga')<span class="text-danger">{{ $message }}</span> @enderror                 
                  </div>
              </div>
              
             <div class="form-group row showcase_row_area" >
                <div class="col-md-3 showcase_text_area">
                <label for="inputType1">Berat</label>
                </div>
                <div class="col-md-9 showcase_content_area">
                <input type="number" wire:model="berat" class="form-control" placeholder="berat">
                @error('berat')<span class="text-danger">{{ $message }}</span> @enderror                 
                </div>
             </div>

            <div class="form-group row showcase_row_area" >
              <div class="col-md-3 showcase_text_area">
              <label for="inputType1">Ukuran</label>
              </div>
              <div class="col-md-9 showcase_content_area">
              <input type="number" wire:model="ukuran" class="form-control" placeholder="ukuran">
              @error('ukuran')<span class="text-danger">{{ $message }}</span> @enderror                 
              </div>
            </div>

          <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Jenis barang</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="jenis_barang" class="form-control" placeholder="jenis_barang">
            @error('jenis_barang')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Gender</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="gender" class="form-control" placeholder="gender">
            @error('gender')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Stock barang</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="stock_barang" class="form-control" placeholder="stock_barang">
            @error('stock_barang')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Deskripsi</label>
            </div>
            <div class="col-md-9 showcase_content_area">
              <textarea  wire:model="deskripsi" class="form-control" rows="20" style="height:100%;" placeholder="Deskripsi...."></textarea>
            {{-- <input type="text" wire:model="deskripsi" class="form-control" placeholder="deskripsi"> --}}
            @error('deskripsi')<span class="text-danger">{{ $message }}</span> @enderror                 
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
      <script>
        function loadPreview(input, id) {
          id = id || '#preview_img';
          if (input.files && input.files[0]) {
              var reader = new FileReader();
       
              reader.onload = function (e) {
                  $(id)
                          .attr('src', e.target.result)
                          .width(200)
                          .height(150);
              };
       
              reader.readAsDataURL(input.files[0]);
          }
       }
      </script>

<script>
  function loadPreview2(input, id) {
    id = id || '#preview_img2';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>

 