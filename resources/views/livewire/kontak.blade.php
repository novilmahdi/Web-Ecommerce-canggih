<div>

   
    <div>
        <section class="contact-section padding_top">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                  <form class="form-contact contact_form" wire:submit.prevent="save" id="contactForm"
                    novalidate="novalidate">
                    <div class="row">
                      <div class="col-12">
                      <div class="form-group">
        
                          <textarea  wire:model="deskripsi" class="form-control w-100" id="message" cols="30" rows="9"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                            placeholder='Enter Message'></textarea>
                            @error('deskripsi')<span class="text-danger">{{ $message }}</span> @enderror
                        
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input wire:model="nama" class="form-control" id="name" type="text" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                            @error('nama')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input wire:model="email" class="form-control"  id="email" type="email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                            @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <button type="submit" class="btn_3 button-contactForm">Send Message</button>
                    </div>
                  </form>
                </div>
                <div class="col-lg-4">
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                      <h3> Freelancer</h3>
                      <p>Aceh,NAD</p>
                    </div>
                  </div>
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                      <h3>+62 823 6069 0352</h3>
                      <p>Telp, Home</p>
                    </div>
                  </div>
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                      <h3>novilmahdi</h3>
                      <p>Send us your query anytime!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      
    </div>
    
</div>
