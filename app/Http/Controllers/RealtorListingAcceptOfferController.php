<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer, Request $request)
    {
        $this->authorize('update', $offer->listing);
        
        $offer->update(['accepted_at' => now()]);
        $offer->listing->update(['sold_at' => now()]);

        $offer->listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()->with('success', "Offer #{$offer->id} have been accepted");
    }
}
