<div>

{{-- Modal Delete --}}
<div class="modal fade bd-example"  id="confirmationModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Vendor</h5>
</div>
<div class="modal-body">
  <h4>Apakah kamu yakin ingin menghapus data berikut ?</h4>
</div>
<div class="modal-footer">

        <button type="button" wire:click.prevent="closebuttonmodal" value="submit" class="btn btn-xs">Cancel</button>
        <button type="button" wire:click.prevent="deleteData" value="submit" class="btn btn-danger btn-xs">Delete</button>
</div>
</div>
</div>
</div>
{{-- ----------- --}}

          {{-- Modal Update --}}
          <div class="modal fade bd-example"  id="modalForm" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vendor</h5>
          
            <button type="button"  wire:click.prevent="closebuttonmodal2" class="close"  aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      
           
          </div>
          <div class="modal-body">
              {{-- @livewire('modal.update-livewire') --}}
          </div>
         
        </div>
      </div>
    </div>
    {{-- ----------- --}}
  <div class="page-content-wrapper">
      <div class="page-content-wrapper-inner">
      <div class="col-lg-12">
          <div class="grid">
            <p class="grid-header">Image&amp;Components Table</p>
            <div class="grid-body">
            <div class="item-wrapper">
              {{-- <div class="table-responsive"> --}}
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>code</th>
                      <th>Kategori_id</th>
                      <th>Action</th>
                      {{-- <th>Created</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @if ($products->count() > 0)
                        
                    
                      @foreach ($products as $product ) 
                    
                      <tr>
                        <td>
                          @php
                            $images = App\Models\ProductImage::where('product_id',
                            $product->id)->get(); 
                          @endphp
                          @foreach ($images as $item )
                              <img class="profile-img img-sm img-rounded mr-2" src="{{ asset('uploads/all') }}/{{ $item->image }}"  class="img-fluid" alt="flag">
                          @endforeach
                           {{-- <img class="profile-img img-sm img-rounded mr-2" src="{{ Storage::url($data->image) }}"  class="img-fluid" alt="flag"> --}}
                        </td>
                        <td> {{ $product->title }}</td>
                        <td> {{ $product->title }}</td>
                        <td> {{ $product->title }}</td>
                        <td> {{ $product->title }}</td>
                        
                        <td>
                        <button class="btn btn-danger btn-xs" wire:click.prevent="confirmUserRemoval({{ $product->id }})">Delete</button>
                        <a href="{{ route('editSepatuProduct', ['id'=>$product->id]) }}">Edit</button>
                        {{-- <button class="btn btn-primary btn-xs" wire:click="selectItem({{ $product->id }}, 'update')">Edit</button> --}}
                      </td>
                        {{-- <td> {{ $data->created_at->diffForHumans()}}</td> --}}
                      </tr>

                    <div>
                    </div>  

                    @endforeach
                    @else
                    <tr>
                      <td colspan="7" style="text-align: center;">Data Kosong</td>
                  </tr>
                    @endif
                  
                  </tbody>
                </table>
            </div>
            
          </div>
          <div class="grid-body">
            {{-- {{ $datas->links() }} --}}
          </div>
        </div>
          </div>
      </div>
</div>
  </div>
</div>
