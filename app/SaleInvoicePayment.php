<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoicePayment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice_payment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_payment_id';

    protected $fillable = [
         'sale_invoice_payment_type_id', 'sale_invoice_id', 'payment_date',
         'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_invoice_payment_type table.
     *
     */
    public function saleInvoicePaymentType()
    {
        return $this->belongsTo('App\SaleInvoicePaymentType', 'sale_invoice_payment_type_id', 'sale_invoice_payment_type_id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoice()
    {
        return $this->belongsTo('App\SaleInvoice', 'sale_invoice_id', 'sale_invoice_id');
    }
}
