<div>
   @foreach ($kontaks as $kontak)
   @if ($updateStateId === $kontak->id)
   <div class="col-md-12 showcase_content_area">
    <textarea wire:model="deskripsi" class="form-control" rows="10" style="height:100%;" placeholder="Code...."></textarea>
  </div> 
   @endif
   @endforeach
</div>
