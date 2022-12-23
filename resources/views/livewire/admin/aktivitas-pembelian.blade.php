<div>
    <div class="grid-body">
        <div class="split-header">
          <p class="card-title">Payment Activity</p>
          <div class="btn-group">
            <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">Expand View</a>
              <a class="dropdown-item" href="#">Edit</a>
            </div>
          </div>
        </div>
        <div class="vertical-timeline-wrapper">
          <div class="timeline-vertical dashboard-timeline">
            @foreach ($belanjas as $belanja )
            <div class="activity-log">
              <p class="log-name">{{ $belanja->user_id}}</p>
              <div class="log-details">{{ $belanja->product_id }}<span class="text-primary ml-1">: Rp.{{ number_format($belanja->total_harga) }}</span></div>
              <div>

                @if ($belanja->status == 1)
                <div class="log-details"><button class="btn btn-xs btn-success">Pending</button></div>
                @elseif($belanja->status == 2)
                <div class="log-details"><button class="btn btn-xs btn-primary">Suksess</button></div>
                @else
                <div class="log-details"><button class="btn btn-xs btn-danger">Menunggu...</button></div>

                    
                @endif
              </div>
              <small class="log-time">{{ $belanja->created_at }}</small>
              
            </div>
            @endforeach
        
          </div>
        </div>
      </div>
      {{ $belanjas->links() }}
</div>
