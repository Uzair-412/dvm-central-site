<div wire:ignore.self class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Login</h4>
          </div>
          @if (session()->has('message'))
                <div class="text-center text-success pb-4">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="text-center text-danger pb-4">
                    {{ session('error') }}
                </div>
            @endif
          <div class="d-flex flex-column text-center">
            <form>
              <div class="form-group">
                <input type="email" wire:model.defer="email" class="form-control" autocomplete="off" placeholder="Email" required placeholder="Your email address...">
                @error('email') <div class="text-danger small text-left pt-3">{{ $message }}</div>@enderror
              </div>
              <div class="form-group">
                <input type="password" wire:model.defer="password" class="form-control" autocomplete="off" placeholder="Password" required>
                @error('password') <div class="text-danger small text-left pt-3">{{ $message }}</div>@enderror
              </div>
              <button wire:click.prevent="login" type="button" class="btn btn-info w-50 text-size-15">Login</button>
            </form>
            
            <div class="d-flex justify-content-center social-buttons">
              
            </di>
          </div>
        </div>
      </div>
        <div class="modal-footer d-flex justify-content-center">
          <div class="signup-section">Not a member yet? <a href="/login" class="text-info"> Sign Up</a>.</div>
        </div>
    </div>
  </div>
