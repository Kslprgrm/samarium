<div>

  <x-component-header>
    Company settings
  </x-component-header>

  <div>

    {{-- Flash message div --}}
    @if (session()->has('message'))
      @include ('partials.flash-message-modal', ['message' => session('message'),])
    @endif

    <div class="row" style="margin: auto;">
      <div class="col-md-8 bg-white">
        <h2 class="h5 mb-3 font-weight-bold my-3">
          Basic Info
        </h2>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-image mr-1"></i>
              Logo
            </label>
            @endif
          </div>
          <div class="col-md-8">
            @if ($company && $company->logo_image_path)
              <div class="d-flex">
                <div class="d-flex justify-content-start mb-3">
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 75px;">
                </div>
                <div class="mx-4">
                  <button class="btn btn-light" wire:click="enterMode('updateLogoImageMode')">
                    <i class="fas fa-pencil-alt mr-1"></i>
                    Change
                  </button>
                </div>
              </div>
            @else
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateLogoImageMode')">
                  Set
                </button>
              </div>
            @endif
          </div>
        </div>

        @if ($modes['updateLogoImageMode'])
          <div class="my-4">
            <div class="d-flex">
              <div class="mr-3">
                <button class="btn btn-primary" wire:click="enterMode('updateLogoImageFromNewUploadMode')">
                  Upload
                </button>
              </div>
              <div class="mr-3">
                <button class="btn btn-success" wire:click="enterMode('updateLogoImageFromLibraryMode')">
                  Media library
                </button>
              </div>
              <div class="mr-3">
                <button class="btn btn-danger" wire:click="exitMode('updateLogoImageMode')">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        @endif

        @if ($modes['updateLogoImageFromNewUploadMode'])
          <div class="my-4 p-3 bg-white border">
            Upload new image
            <div>
              <input type="file" class="form-control" wire:model="logo_image">
              @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div>
              <button class="btn btn-danger" wire:click="exitMode('updateLogoImageFromNewUploadMode')">
                Cancel
              </button>
              <button wire:loading class="btn">
                <span class="spinner-border text-info mr-3" role="status">
                </span>
              </button>
            </div>
          </div>
        @endif

        @if ($modes['updateLogoImageFromLibraryMode'])
          @livewire ('cms.dashboard.media-select-image-component')
        @endif

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-home mr-1"></i>
              Name
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="name" style="{{-- font-size: 1.3rem; --}}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-circle mr-1"></i>
              Short name
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="short_name" style="{{-- font-size: 1.3rem; --}}">
            @error('short_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-info-circle mr-1"></i>
              Tagline
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="tagline" style="{{-- font-size: 1.3rem; --}}">
            @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-phone mr-1"></i>
              Phone
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="phone" style="{{-- font-size: 1.3rem; --}}">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-envelope mr-1"></i>
              Email
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="email" style="{{-- font-size: 1.3rem; --}}">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-map-marker-alt mr-1"></i>
              Address
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="address" style="{{-- font-size: 1.3rem; --}}">
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-info-circle mr-1"></i>
              PAN Number
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="pan_number" style="{{-- font-size: 1.3rem; --}}">
            @error('pan_number') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>


        <hr class="my-5"/>

        <h2 class="h5 mb-3 font-weight-bold">
          Social Media Links
        </h2>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-facebook"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="fb_link" style="{{-- font-size: 1.3rem; --}}">
            @error('fb_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-twitter"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="twitter_link" style="{{-- font-size: 1.3rem; --}}">
            @error('twitter_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-instagram"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="insta_link" style="{{-- font-size: 1.3rem; --}}">
            @error('insta_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-youtube"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="youtube_link" style="{{-- font-size: 1.3rem; --}}">
            @error('youtube_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-tiktok"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="tiktok_link" style="{{-- font-size: 1.3rem; --}}">
            @error('tiktok_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        {{-- Submit button section --}}
        <div class="my-4">
          @if ($company)
            @include ('partials.button-update')
          @else
            @include ('partials.button-store')
            @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
          @endif

          <button wire:loading class="btn">
            <span class="spinner-border text-info mr-3" role="status">
            </span>
          </button>
        </div>
      </div>

      <div class="col-md-4 p-0 px-0 px-md-2 mt-4 mt-md-0">
        {{--
        |
        | Company info section
        |
        | Show this section only if company already exists. Do not show this
        | during first time when company is being created for the first time.
        |
        | Additional info is added only once company is already created. This
        | will keep the workflow clean as well.
        | 
        --}}
        <div class="bg-white border h-100">
          @if ($company)
            <div class="p-2">
              <h2 class="h5 mb-3 mt-2 font-weight-bold">
                Additional Info
              </h2>

              {{-- Show additional company info --}}
              @if (count($company->companyInfos) > 0)
                @foreach ($company->companyInfos as $companyInfo)
                  @livewire ('company.dashboard.company-info-display',
                      ['companyInfo' => $companyInfo,],
                      key('company-info-' . $companyInfo->company_info_id)
                  )
                @endforeach
              @else
                <div>
                  No additional company info.
                </div>
              @endif

              {{-- Show additional company info --}}
              <div class="my-3">
                @if ($modes['companyInfoCreateMode'])
                  @livewire ('company.dashboard.company-info-create', ['company' => $company,])
                @else
                  <button class="btn btn-light shadow-sm pl-3 text-primary" wire:click="enterMode('companyInfoCreateMode')">
                    Add company info
                  </button>
                @endif
              </div>

            </div>
          @endif
        </div>
      </div>

    </div>


    {{--
    |
    | Brief company description
    |
    | Brief description of the company. Could include location, products, niche, or any other
    | information.
    | 
    --}}
    @if ($company)
    <div class="my-4 bg-white border p-3">
      <h2 class="h5 font-weight-bold">
        Brief description
      </h2>

      @if ($company->brief_description)
        @if ($modes['briefDescriptionUpdateMode'])
          @livewire ('company.brief-description-edit', ['company' => $company,])
        @else
          <div class="py-3">
            {{ $company->brief_description}}
          </div>
          <div class="py-3-rm text-muted">
            <button class="btn btn-light ml-0 pl-0 border-rm text-primary" wire:click="enterMode('briefDescriptionUpdateMode')">
              <i class="fas fa-pencil-alt mr-1"></i>
              Edit
            </button>
          </div>
        @endif
      @else
        @if ($modes['briefDescriptionCreateMode'])
          @livewire ('company.brief-description-create', ['company' => $company,])
        @else
          <div class="py-3 text-muted">
            No brief description.
          </div>
          <div class="py-3-rm text-muted">
            <button class="btn btn-light ml-0 pl-0 border-rm text-primary" wire:click="enterMode('briefDescriptionCreateMode')">
              Add brief description
            </button>
          </div>
        @endif
      @endif
    </div>
    @endif


    {{--
    |
    | Google map share link
    |
    | Google map share link of the company
    | 
    --}}
    @if ($company)
    <div class="my-4 bg-white border p-3">
      <h2 class="h5 font-weight-bold">
        Google map share link
      </h2>

      @if ($company->google_map_share_link)
        @if ($modes['googleMapShareLinkUpdateMode'])
          @livewire ('company.google-map-share-link-edit', ['company' => $company,])
        @else
          <div class="py-3">
            {{ $company->google_map_share_link}}
          </div>
          <div class="py-3-rm text-muted">
            <button class="btn btn-light ml-0 pl-0 border-rm text-primary" wire:click="enterMode('googleMapShareLinkUpdateMode')">
              <i class="fas fa-pencil-alt mr-1"></i>
              Edit
            </button>
          </div>
        @endif
      @else
        @if ($modes['googleMapShareLinkCreateMode'])
          @livewire ('company.google-map-share-link-create', ['company' => $company,])
        @else
          <div class="py-3 text-muted">
            No google map share link.
          </div>
          <div class="py-3-rm text-muted">
            <button class="btn btn-light ml-0 pl-0 border-rm text-primary" wire:click="enterMode('googleMapShareLinkCreateMode')">
              Add google map share link.
            </button>
          </div>
        @endif
      @endif
    </div>
    @endif

  </div>

</div>
