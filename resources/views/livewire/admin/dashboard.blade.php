
<div class="page-content-wrapper">

  
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
                @livewire('admin.modal-view-kontak')
            </div>
           
          </div>
        </div>
      </div>
      {{-- ----------- --}}

    <div class="page-content-wrapper-inner">
      <div class="content-viewport">
        <div class="row">
          <div class="col-12 py-2">
            <h4>Dashboard</h4>
            <p class="text-gray">Selamat datang, Novil</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-6 equel-grid" wire:ignore>
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>30%</p>
                  <p>+06.2%</p>
                </div>
                <p class="text-black">Total product</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 equel-grid" wire:ignore>
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>43%</p>
                  <p>+15.7%</p>
                </div>
                <p class="text-black">Total order</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_2"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 equel-grid" wire:ignore>
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>23%</p>
                  <p>+02.7%</p>
                </div>
                <p class="text-black">Total pending</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_3"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 equel-grid" wire:ignore>
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>75%</p>
                  <p>+53.34%</p>
                </div>
                <p class="text-black">Total users</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_4"></canvas>
                </div>
              </div>
            </div>
          </div>
       
          <div class="col-lg-8 col-md-6 equel-grid">
            <div class="grid">
              <div class="item-wrapper" >
                  
              
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Name</th>
                      <th>Deskripsi</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody  wire:loading.remove>
                    @foreach ($kontaks as $kontak)
                    <tr>
                        <td>{{ $kontak->email }}</td>
                        <td>{{ $kontak->nama }}</td>
                        <td>{{ Str::limit($kontak->deskripsi, 15) }}</td>
                        <td>{{ $kontak->created_at }}</td>
                        <td>
                          <button class="btn btn-primary btn-xs" wire:click="selectItem({{ $kontak->id}}, 'view')">View</button>
                          <button class="btn btn-xs btn-inverse-primary" style="color:red;" wire:click.prevent="confirm({{ $kontak->id}})">Delete</button>
                        </td>
                       
                    </tr>
              @endforeach
                 
                  </tbody>
                </table>
                <div class="grid-body">
                  {{ $kontaks->links() }}
                </div>
                {{-- Loading --}}
                <br>
                <div class="flex items-center justify-center mt-10">
                  <div wire:loading style="border-top-color: transparent;"
                  class="w-16 h-16 border-4 border-blue-400 border-solid rounded-full animate-spin">
                  </div>
              </div>
              {{-- End Loading --}}
            </div>
            </div>
          </div>
         
          {{-- @livewire('dashboard.dashboard-kontak') --}}

          {{-- Tampilan tabel komen pada dashboard--}}
          {{-- @livewire('dashboard.dashboard-komen') --}}
          {{-- end--}}

          <div class="col-md-4 equel-grid">
            <div class="grid">
            @livewire('admin.aktivitas-pembelian')
              {{-- <a class="border-top px-3 py-2 d-block text-gray" href="#">
                <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i> View All </small>
              </a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content viewport ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="row">
        <div class="col-sm-6 text-center text-sm-right order-sm-1">
          <ul class="text-gray">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">RushNVL</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <!-- partial -->
  </div>