<button type="submit"
    class="btn btn-success-rm px-3 py-3" wire:click="{{ $clickMethod }}"
    style="font-size: 1.1rem ; background-color: {{ env('OC_SELECT_COLOR', '#000050') }}; color: white;">
  <strong>
    {{ $btnText }}
  </strong>
</button>
