<div>


  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h5 font-weight-bold">
        Purchase search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          style="font-size: 1.5rem;"
          wire:model.defer="vendor_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>


  {{-- Show search results --}}
  <div class="my-3 mt-5">
    <h2 class="h5 font-weight-bold">
      Search results
    </h2>
  </div>


  {{-- Show in bigger screens --}}
  <div class="table-responsive bg-white">
    <table class="table border mb-0" style="font-size: 1rem;">
      <thead>
        <tr class="
            {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
        ">
          <th>ID</th>
          <th style="width: 100px;">Date</th>
          <th>Vendor</th>
          <th>Items</th>
          <th style="width: 200px;">Payment Status</th>
          <th>Pending</th>
          <th>Amount</th>
        </tr>
      </thead>

      <tbody>
        @if (!is_null($purchases) && count($purchases) > 0)
          @foreach ($purchases as $purchase)
            <tr wire:key="{{ rand() }}" wire:click="$emit('displayPurchase', {{ $purchase->purchase_id }})" style="font-size: 0.8rem;" role="button">
              <td>
                {{ $purchase->purchase_id }}
              </td>
              <td style="font-size: 0.8rem;">
                {{ $purchase->purchase_date }}
              </td>
              <td>
                @if ($purchase->vendor)
                  {{ $purchase->vendor->name }}
                @else
                @endif
              </td>
              <td>
                @if ($purchase->purchaseItems)
                  @foreach ($purchase->purchaseItems as $purchaseItem )
                    {{ $purchaseItem->product->name }}
                    ,
                  @endforeach
                @else
                  NONE
                @endif
              </td>
              <td>
                @if ($purchase)
                  @if ($purchase->payment_status == 'pending')
                    <span class="badge badge-pill badge-danger">
                      Pending
                    </span>
                  @elseif ($purchase->payment_status == 'partially_paid')
                    <span class="badge badge-pill badge-warning">
                      Partial
                    </span>
                  @elseif ($purchase->payment_status == 'paid')
                    <span class="badge badge-pill badge-success">
                      Paid
                    </span>
                  @else
                    {{ $purchase->payment_status }}
                  @endif
                @endif
              </td>
              <td>
                @if (is_int($purchase->getPendingAmount()))
                  @php echo number_format( $purchase->getPendingAmount() ); @endphp
                @else
                  @php echo number_format( $purchase->getPendingAmount(), 2 ); @endphp
                @endif
              </td>
              <td>
                @if (is_int($purchase->getTotalAmount()))
                  @php echo number_format( $purchase->getTotalAmount() ); @endphp
                @else
                  @php echo number_format( $purchase->getTotalAmount(), 2 ); @endphp
                @endif
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td>
              No results
            </td>
          </tr>
        @endif
      </tbody>

    </table>
  </div>


</div>
