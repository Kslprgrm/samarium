<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_id';

    protected $fillable = [
         'vendor_id', 'payment_status'
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * vendor table.
     *
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id', 'vendor_id');
    }

    /*
     * purchase_item table.
     *
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\PurchaseItem', 'purchase_id', 'purchase_id');
    }

    /*
     * purchase_payment table.
     *
     */
    public function purchasePayments()
    {
        return $this->hasMany('App\PurchasePayment', 'purchase_id', 'purchase_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * Get total amount.
     *
     */
    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->purchaseItems as $purchaseItem) {
            $total += $purchaseItem->getTotalAmount();
        }

        return $total;
    }

    /*
     * Get pending amount.
     *
     */
    public function getPendingAmount()
    {
        $pendingAmount = $this->getTotalAmount();

        foreach ($this->purchasePayments as $purchasePayment) {
            $pendingAmount -= $purchasePayment->amount;
        }

        return $pendingAmount;
    }
}
