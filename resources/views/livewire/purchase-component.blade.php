<div>
  <div wire:loading>
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  @if (! $modes['create'] && ! $modes['display'])
  <div class="mb-3">
    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus mr-3"></i>
      New
    </button>
  </div>
  @endif

  @if ($modes['create'])
    @livewire ('purchase-create')
  @elseif ($modes['display'])
    @livewire ('purchase-display', ['purchase' => $displayingPurchase,])
  @else
    @livewire ('purchase-list')
  @endif

</div>
