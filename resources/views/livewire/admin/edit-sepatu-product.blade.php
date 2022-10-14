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
                      <input  type="file" wire:model="images"  style="padding: 3px; font-size: 12px;" class="form-control"  multiple id="upload-img">
                      @error('images')<span class="text-danger">{{ $message }}</span> @enderror                 
                    </div>
                  </div>
                </div>
                
               
                  {{-- Image multiple preview --}}
                  <div class="form-group row showcase_row_area">
                   <div class="col-md-3 showcase_text_area">
                     <label> </label>
                   </div>
                   <div class="col-md-9 showcase_content_area">
                     <div wire:loading wire:target="images">
                       <div class="loader"></div>
                     </div>
                      <div class="flex bg-blue-200 p-4 rounded-lg">
                        <div wire:ignore>
                       <div class="col">
                         
                         <div class="preview_img img-thumbs-hidden" id="img-preview"></div>
                      </div>
                    </div>
 
                      
                     </div>
                   </div>                            
                 </div>
                 {{-- End --}}




                <div class="form-group row showcase_row_area">
                  <div class="col-md-3 showcase_text_area">
                    <label> </label>
                  </div>
                  <div class="col-md-9 showcase_content_area">
                    <div wire:loading wire:target="images">
                      <div class="loader"></div>
                    </div>
                     <div class="flex bg-blue-200 p-4 rounded-lg">
                       
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

          <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Jenis barang</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="jenis_barang" class="form-control" readonly placeholder="jenis_barang">
            @error('jenis_barang')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Gender</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="text" wire:model="gender" class="form-control" placeholder="Pria/Wanita">
            @error('gender')<span class="text-danger">{{ $message }}</span> @enderror                 
            </div>
           </div>

           <div class="form-group row showcase_row_area" >
            <div class="col-md-3 showcase_text_area">
            <label for="inputType1">Stock barang</label>
            </div>
            <div class="col-md-9 showcase_content_area">
            <input type="number" wire:model="stock_barang" class="form-control" placeholder="Total unit barang digudang">
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
            $('#upload-img').val('');
          });
      });
  
  </script>

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


{{-- Jquery image multiple preview --}}
<script>
  var imgUpload = document.getElementById('upload-img')
  , imgPreview = document.getElementById('img-preview')
  , imgUploadForm = document.getElementById('form-upload')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;

imgUpload.addEventListener('change', previewImgs, true);

function previewImgs(event) {
  totalFiles = imgUpload.files.length;
  
     if(!!totalFiles) {
    imgPreview.classList.remove('img-thumbs-hidden');
  }
  
  for(var i = 0; i < totalFiles; i++) {
    wrapper = document.createElement('div');
    wrapper.classList.add('wrapper-thumb');
    removeBtn = document.createElement("span");
    nodeRemove= document.createTextNode('x');
    removeBtn.classList.add('remove-btn');
    removeBtn.appendChild(nodeRemove);
    img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[i]);
    img.classList.add('img-preview-thumb');
    wrapper.appendChild(img);
    wrapper.appendChild(removeBtn);
    imgPreview.appendChild(wrapper);
   
    $('.remove-btn').click(function(){
      $(this).parent('.wrapper-thumb').remove();
    });    

  }
  
  
}
</script>
{{-- End --}}

 