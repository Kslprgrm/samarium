<div>

  {{-- Online store hero --}}
  @if (false)
  @include ('partials.os.hero')
  @endif

  @if (false)
  @include ('partials.ecomm-website.main-flier')
  @endif

  @if (false)
  <div class="border shadow-sm">
    @include ('partials.ecomm-website.main-hero')
  </div>
  @endif





  @if (true)
  {{-- Show only in big screens for now --}}
  <div class="container-fluid bg-light-rm d-none d-md-block" style="background-color: #edeaea;">
  <div class="container pt-4-rm">
    <div class="row border-rm shadow-rm">
      <div class="col-md-4 p-3-rm">
        <div class="d-flex-rm justify-content-center-rm h-100 bg-danger-rm" style="{{--background-color: orange;--}}">
          @if (true)
          <div class="d-flex-rm flex-column-rm justify-content-center-rm h-100">
            <div class="bg-white h-100" style="width: 300px;">
              @php
                $ii = 0;
              @endphp
              @foreach ($productCategories as $productCategory)
                @if ($ii >= 5)
                  @break
                @endif
                <a
                    href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                    class="text-reset text-decoration-none"
                >
                  <div class="px-3 py-1 border-top">
                      <img class="img-fluid h-25-rm w-100-rm"
                          src="{{ asset('storage/' . $productCategory->image_path) }}"
                          alt="{{ $productCategory->name }}"
                          style="max-height: 50px; max-width: 50px;">
                      {{ $productCategory->name }}
                  </div>
                </a>
                @php
                  $ii++;
                @endphp
              @endforeach
              <div class="p-3 border-top">
                <a href="#o-all-categories">
                <i class="fas fa-dice-d6 mr-3"></i>
                Sell all categories
                </a>
              </div>
            </div>
          </div>
          @endif


        </div>
      </div>
      <div class="col-md-8 p-3">

        <div>
          <h2 class="bg-white-rm text-danger-rm font-weight-bold p-3 mb-4" style="{{--background-color: white; color: gray;--}}">
            Featured products
          </h2>
        </div>


        <div class="row">

          @for ($ii=1; $ii <= \App\Product::count(); $ii++)
            <div class="col-md-3">
              <div class="card h-100 shadow">
      
                <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
                  <a href="{{ route('website-product-view', [\App\Product::find($ii)->product_id, \App\Product::find($ii)->name]) }}">
                    <div class="d-flex justify-content-center bg-warning-rm">
                        @if ($productCategory->image_path)
                          <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . \App\Product::find($ii)->image_path) }}" alt="{{ $productCategory->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
                        @else
                          <i class="fas fa-dice-d6 fa-8x text-muted m-5"></i>
                        @endif
                    </div>
                  </a>
      
                  <div class="d-flex flex-column justify-content-between flex-grow-1 overflow-auto" style="background-color: #f5f5f5;">
                    <div class="p-2">
                      <a href="{{ route('website-product-view', [\App\Product::find($ii)->product_id, \App\Product::find($ii)->name]) }}">
                        <h2 class="h4 font-weight-bold mt-2 mb-2 text-dark" style="font-family: Arial;">
                          {{ strtoupper(\App\Product::find($ii)->name) }}
                          <br />
                          <span class="text-danger ml-1-rm">
                            Rs {{ \App\Product::find($ii)->selling_price }}
                          </span>
                        </h2>
                      </a>
      
                    </div>
                  </div>
                </div>

              </div>
            </div>
          @endfor

        </div>

        @if (false)
        @if (false)
        <div>
          <div class="d-flex">
            <div class="p-1 border mr-3 bg-white">
             Fres shipping
            </div>
            <div class="p-1 border mr-3 bg-white">
             Cash on delivery
            </div>
            <div class="p-1 border mr-3 bg-white">
             Best shop
            </div>
          </div>
        </div>
        @endif
        <div>
          <div class="d-flex justify-content-center-rm">

            <div>
              @if (true)
              @if (false)
              <h2 class="h5 text-white-rm badge-rm badge-pill-rm badge-success-rm mb-5 py-3"
                  style="font-size: 1rem; border-top: 5px solid brown;">
                FEATURED PRODUCT
              </h2>
              @endif

              <h2 class="h4 text-white-rm font-weight-bold" style="font-size: 2rem;">
                {{ strtoupper(\App\Product::first()->name) }}
              </h2>
              <img class="img-fluid h-25-rm w-100-rm"
                  src="{{ asset('storage/' . \App\Product::first()->image_path) }}"
                  alt="Product image"
                  style="max-height: 100px; max-width: 100px;">
              @if (false)
              <p class="text-secondary-rm" style="">
                {{ \App\Product::first()->description }}
              </p>
              @endif
              <h2 class="h4 text-danger-rm font-weight-bold" style="font-size: 1.5rem; color: orange;">
                Rs
                {{ \App\Product::first()->selling_price }}
              </h2>
              <div class="my-3">
                <a href="{{ route('website-product-view', [\App\Product::first()->product_id, \App\Product::first()->name]) }}"
                    class="btn btn-block btn-danger p-3">
                  VIEW PRODUCT
                </a>
              </div>
              @endif
            </div>

            <div class="">
              @if (\App\Product::first())
                <div class="shadow-lg-rm">
                  @if (false)
                    @livewire ('ecomm-website.product-list-display', ['product' => \App\Product::first(),])
                  @else
                    @if (false)
                    <img class="img-fluid h-25-rm w-100-rm"
                        src="{{ asset('storage/' . \App\Product::first()->image_path) }}"
                        alt="Product image"
                        style="max-height: 250px; max-width: 250px;">
                    @endif
                  @endif
                </div>
              @else
                <div class="border bg-light-rm shadow p-3 h-100 rounded" style="background-color: #eaeaef;">
                  <div class="d-flex">
                    <div>
                      <p class="text-secondary">
                        Thanks for visiting our online store.
                      </p>
                      <p class="text-secondary">
                        Explore our products.
                      </p>
                      <div class="mt-5 mb-4">
                        <a href=""  class="font-weight-bold" style="color: orange;">
                          <span style="font-size: 1.1rem;">
                            Register now
                          </span>
                        </a>
                      </div>
                    </div>
                    <div>
                      <img class="img-fluid h-25-rm w-100-rm"
                          src="{{ asset('storage/' . $company->logo_image_path) }}"
                          alt="Our image collection"
                          style="{{--max-height: 250px; max-width: 250px;--}}">
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  </div>
  @endif




  {{-- Show product search --}}
  @if (false)
  <div class="container p-3 border mt-4">
    @error ('search_name')
      <div class="py-2 text-danger">
        <i class="fas fa-exclamation-circle mr-3"></i>
        Enter search name
      </div>
    @enderror
    <input type="text" class="mr-3" wire:model.defer="search_name" placeholder="Search product"/>
    <button class="btn btn-success shadow-sm" style="font-size: 1.3rem;" wire:click="search">
      Go
    </button>
  </div>
  @endif

  <div>
  @if (! $modes['searchResult'])
    @if (false)
    {{-- Show products of each product category --}}
    @foreach ($productCategories as $productCategory)
      @if (count($productCategory->products) > 0 || count($productCategory->subProductCategories) > 0)
        <div class="container mt-4">
          @if (false)
          <h2 class="mb-3">
            {{ $productCategory->name }}
          </h2>
          <hr/>
          @endif
          @livewire ('ecomm-website.product-category-product-list', ['productCategory' => $productCategory,],
              key(rand() * $productCategory->product_category_id))
        </div>
      @endif
    @endforeach
    @endif

    {{-- Show this for now --}}
    <div class="container p-5" id="o-all-categories">
      <h2 class="h1 mt-2 mb-1">
        Categories
      </h2>
      <p class="text-secondary">
        Browse our products by category
      </p>
      <div class="row bg-danger-rm">
        @foreach ($productCategories as $productCategory)

          <div class="col-md-3 my-4">
            <div class="h-100 shadow-rm">
              {{-- Show in smaller screens --}}
              <div class="d-md-none">
              </div>
            
              {{-- Show in bigger screens --}}
              <div class="d-none-rm d-md-block-rm h-100">
                <div class="card h-100 shadow border-0">
            
                  <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
                    <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
                      <div class="d-flex justify-content-center bg-warning-rm">
                          @if ($productCategory->image_path)
                            <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{ $productCategory->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
                          @else
                            <i class="fas fa-dice-d6 fa-8x text-muted m-5"></i>
                          @endif
                      </div>
                    </a>
            
                    <div class="d-flex flex-column justify-content-between flex-grow-1 overflow-auto" style="background-color: #f5f5f5;">
                      <div class="p-2">
                        <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
                          <h2 class="h4 font-weight-bold mt-2 mb-2 text-dark" style="font-family: Arial;">
                            {{ strtoupper($productCategory->name) }}
                          </h2>
                        </a>
            
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          @if (false)
          <div class="col-md-3 m-0 p-3 border-rm bg-warning-rm">
            <a class="text-reset h-100" href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
              <div class="d-flex bg-white text-dark border p-3-rm shadow-lg h-100">
                <div class="bg-white text-secondary p-5 flex-grow-1-rm">
                  <div class="d-flex-rm flex-column-rm justify-content-center-rm mr-4-rm bg-danger-rm w-50-rm">
                    @if (false)
                    <i class="fas fa-hashtag fa-2x mr-2 text-warning-rm" style="color: orange;"></i>
                    @endif
                    @if ($productCategory->image_path)
                      <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{ $productCategory->name }}" style="{{--max-height: 250px; max-width: 250px;--}}">
                    @else
                      <i class="fas fa-clone fa-3x"></i>
                    @endif
                  </div>
                  <h2 class="h-100-rm" style="font-family: Mono;">
                    {{ $productCategory->name }}
                  </h2>
                </div>
                @if (false)
                <div class="d-flex justify-content-end">
                  <div class="d-flex flex-column justify-content-center mr-4-rm bg-danger-rm w-50">
                    @if (false)
                    <i class="fas fa-hashtag fa-2x mr-2 text-warning-rm" style="color: orange;"></i>
                    @endif
                    @if ($productCategory->image_path)
                      <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{
                      $productCategory->name }}" style="{{--max-height: 250px; max-width: 250px;--}}">
                    @else
                      <i class="fas fa-clone fa-3x"></i>
                    @endif
                  </div>
                </div>
                @endif
              </div>
            </a>
          </div>
          @endif











        @endforeach
      </div>
    </div>

  @else
    @if (false)
    <div>
      <div class="container">
        <div class="my-3 text-scondary">
          Displaying
          {{ count($products) }}
          out of
          {{ count($products) }}
          products
        </div>
    
        @if (count($products) > 0)
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-4 mb-4">
                @livewire ('website-product-list-display', ['product' => $product,], key(rand() * $product->product_id))
              </div>
            @endforeach
          </div>
        @else
          <div class="p-2 text-secondary" style="font-size: 1.3rem;">
            Not found: {{ $search_name }} 
          </div>
        @endif
      </div>
    </div>
    @endif
  @endif
  </div>
</div>
