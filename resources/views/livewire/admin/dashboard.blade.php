
<div class="page-content-wrapper">
    <div class="page-content-wrapper-inner">
      <div class="content-viewport">
        <div class="row">
          <div class="col-12 py-2">
            <h4>Dashboard</h4>
            <p class="text-gray">Selamat datang, sNovil</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-6 equel-grid">
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>30%</p>
                  <p>+06.2%</p>
                </div>
                <p class="text-black">Upload artikel</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 equel-grid">
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>43%</p>
                  <p>+15.7%</p>
                </div>
                <p class="text-black">Upload video</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_2"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 equel-grid">
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>23%</p>
                  <p>+02.7%</p>
                </div>
                <p class="text-black">Edit artikel</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_3"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-6 equel-grid">
            <div class="grid">
              <div class="grid-body text-gray">
                <div class="d-flex justify-content-between">
                  <p>75%</p>
                  <p>- 53.34%</p>
                </div>
                <p class="text-black">Edit video</p>
                <div class="wrapper w-50 mt-4">
                  <canvas height="45" id="stat-line_4"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 equel-grid">
            <div class="grid">
              <div class="grid-body d-flex flex-column h-100">
                <div class="wrapper">
                  <div class="d-flex justify-content-between">
                    <div class="split-header">
                      <img class="img-ss mt-1 mb-1 mr-2" src="{{ asset('assets2/images/social-icons/instagram.svg') }}" alt="instagram">
                      <p class="card-title">Followers Growth</p>
                    </div>
                    <div class="wrapper">
                      <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-access-point text-muted mdi-2x"></i></button>
                      <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-cloud-download-outline text-muted mdi-2x"></i></button>
                    </div>
                  </div>
                  <div class="d-flex align-items-end pt-2 mb-4">
                    <h4>16.2K</h4>
                    <p class="ml-2 text-muted">New Followers</p>
                  </div>
                </div>
                <div class="mt-auto">
                  <canvas class="curved-mode" id="followers-bar-chart" height="220"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 equel-grid">
            <div class="grid">
              <div class="grid-body">
                <p class="card-title">Campaign</p>
                <div id="radial-chart"></div>
                <h4 class="text-center">$23,350.00</h4>
                <p class="text-center text-muted">Used balance this billing cycle</p>
              </div>
            </div>
          </div>
         
          {{-- @livewire('dashboard.dashboard-kontak') --}}

          {{-- Tampilan tabel komen pada dashboard--}}
          {{-- @livewire('dashboard.dashboard-komen') --}}
          {{-- end--}}

          <div class="col-md-4 equel-grid">
            <div class="grid">
              <div class="grid-body">
                <div class="split-header">
                  <p class="card-title">Activity Log</p>
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
                    <div class="activity-log">
                      <p class="log-name">Agnes Holt</p>
                      <div class="log-details">Analytics dashboard has been created<span class="text-primary ml-1">#Slack</span></div>
                      <small class="log-time">8 mins Ago</small>
                    </div>
                    <div class="activity-log">
                      <p class="log-name">Ronald Edwards</p>
                      <div class="log-details">Report has been updated <div class="grouped-images mt-2">
                          <img class="img-sm" src="{{ asset('assets2/images/profile/male/image_4.png') }}" alt="Profile Image" data-toggle="tooltip" title="Gerald Pierce">
                          <img class="img-sm" src="{{ asset('assets2/images/profile/male/image_5.png') }}" alt="Profile Image" data-toggle="tooltip" title="Edward Wilson">
                          <img class="img-sm" src="{{ asset('assets2/images/profile/female/image_6.png') }}" alt="Profile Image" data-toggle="tooltip" title="Billy Williams">
                          <img class="img-sm" src="{{ asset('assets2/images/profile/male/image_6.png') }}" alt="Profile Image" data-toggle="tooltip" title="Lelia Hampton">
                          <span class="plus-text img-sm">+3</span>
                        </div>
                      </div>
                      <small class="log-time">3 Hours Ago</small>
                    </div>
                    <div class="activity-log">
                      <p class="log-name">Charlie Newton</p>
                      <div class="log-details"> Approved your request <div class="wrapper mt-2">
                          <button type="button" class="btn btn-xs btn-primary">Approve</button>
                          <button type="button" class="btn btn-xs btn-inverse-primary">Reject</button>
                        </div>
                      </div>
                      <small class="log-time">2 Hours Ago</small>
                    </div>
                    <div class="activity-log">
                      <p class="log-name">Gussie Page</p>
                      <div class="log-details">Added new task: Slack home page</div>
                      <small class="log-time">4 Hours Ago</small>
                    </div>
                    <div class="activity-log">
                      <p class="log-name">Ina Mendoza</p>
                      <div class="log-details">Added new images</div>
                      <small class="log-time">8 Hours Ago</small>
                    </div>
                  </div>
                </div>
              </div>
              <a class="border-top px-3 py-2 d-block text-gray" href="#">
                <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i> View All </small>
              </a>
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