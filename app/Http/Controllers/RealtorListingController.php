<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class RealtorListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, listing);
    }

    public function index()
    {
        return inertia('Realtor/Index', [
            'listings' => \Auth::user()->listings()->get()
        ]);
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        return redirect()->back()
            ->with('success', 'Listing have been deleted!');
    }
}
