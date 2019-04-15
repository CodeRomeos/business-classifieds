<?php

namespace App\Observers;

use App\Business;

class BusinessObserver
{

    public function creating(Business $business)
    {
        $business->slug = str_slug($business->slug);
        $business->businessid = uniqidReal(10);

        return $business;
    }

    /**
     * Handle the business "created" event.
     *
     * @param  \App\Business  $business
     * @return void
     */
    public function created(Business $business)
    {
        //
    }

    /**
     * Handle the business "updated" event.
     *
     * @param  \App\Business  $business
     * @return void
     */
    public function updated(Business $business)
    {
        //
    }

    /**
     * Handle the business "deleted" event.
     *
     * @param  \App\Business  $business
     * @return void
     */
    public function deleted(Business $business)
    {
        //
    }

    /**
     * Handle the business "restored" event.
     *
     * @param  \App\Business  $business
     * @return void
     */
    public function restored(Business $business)
    {
        //
    }

    /**
     * Handle the business "force deleted" event.
     *
     * @param  \App\Business  $business
     * @return void
     */
    public function forceDeleted(Business $business)
    {
        //
    }
}
