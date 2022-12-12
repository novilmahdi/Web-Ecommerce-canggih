<div>
  <div class="page-content-wrapper">
  <div class="page-content-wrapper-inner">
    <div class="col-lg-12">
      <div class="grid">
        <p class="grid-header">Unggah product Sepatu</p>
        <div class="grid-body">
          <div class="item-wrapper">
            <div class="row mb-3">
              <div class="col-md-8 mx-auto">
                <form id="upload-images"  wire:submit.prevent="storeProduct"  novalidate="novalidate" enctype="multipart/form-data">      
                  
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
                        <input id="fileId" type="file" wire:model="images_preview" style="padding: 3px; font-size: 12px;" class="form-control" id="exampleInputFile">
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
                      @if ($images_preview)
                      <div class="flex bg-blue-200 p-4 rounded-lg">
                          <img class="w-32 h-32 p-2 rounded-lg" src="{{ $images_preview->temporaryUrl() }}">
                      </div>
                     @endif
                  </div>
                  </div>
                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                    <label>Gambar Multiple</label>
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
                    <label> </label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <div wire:loading wire:target="images">
                        <div class="loader"></div>
                     </div>
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
                <input type="number" wire:model="berat" class="form-control" placeholder="kg">
                @error('berat')<span class="text-danger">{{ $message }}</span> @enderror                 
                </div>
             </div>

            <div class="form-group row showcase_row_area" >
              <div class="col-md-3 showcase_text_area">
              <label for="inputType1">Ukuran</label>
              </div>
              <div class="col-md-9 showcase_content_area">
              <input type="number" wire:model="ukuran" class="form-control" placeholder="cm">
              @error('ukuran')<span class="text-danger">{{ $message }}</span> @enderror                 
              </div>
            </div>

           {{-- <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Gender</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="gender" class="form-control" placeholder="Pria/Wanita">
            @error('gender')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div> --}}
           
           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Gender</label>
            </div>

            <div class="col-md-9 showcase_content_area">
              <div class="form-inline">
                <div class="radio mb-3">
                  <label class="radio-label mr-4">
                    <input name="sample" wire:model="gender" type="radio"> Pria <i class="input-frame"></i>
                  </label>
                </div>
                <div class="radio mb-3">
                  <label class="radio-label">
                    <input name="sample"  wire:model="genderW" type="radio">Wanita <i class="input-frame"></i>
                  </label>
                </div>
              </div>
            @error('gender')<span class="text-danger">{{ $message }}</span> @enderror     
            @error('genderW')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Stock barang</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="stock_barang" class="form-control" placeholder="Total unit barang digudang">
            @error('stock_barang')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Deskripsi</label>
            </div>
            <div class="col-md-9 showcase_content_area">
              <textarea  wire:model="deskripsi" class="form-control" rows="20" style="height:100%;" placeholder="Penjelasan barang ya akan dijual..."></textarea>
            {{-- <input type="text" wire:model="deskripsi" class="form-control" placeholder="deskripsi"> --}}
            @error('deskripsi')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

              <br>
                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                   <label for="inputType1"></label>

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
 