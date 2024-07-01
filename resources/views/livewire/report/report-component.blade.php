<div class="p-3-rm p-md-none">

  <x-component-header>
    Reports
  </x-component-header>

  <div class="row mb-4">
    <div class="col-md-3 mb-3">
      @livewire ('report.report-transaction-component')
    </div>
    <div class="col-md-3 mb-3">
      @livewire ('chart.chart-week-sales', key(rand()))
    </div>
    <div class="col-md-6 mb-3">
      @livewire ('chart.chart-sale-by-category', key(rand()))
    </div>
  </div>

  <div class="row p-2">
    <div class="col-md-5 bg-white border mr-3 mb-3">
      @livewire ('report.report-product-sales-count')
    </div>
    <div class="col-md-5 bg-white border mb-3">
      @livewire ('report.report-product-purchase-count')
    </div>
  </div>


</div>
