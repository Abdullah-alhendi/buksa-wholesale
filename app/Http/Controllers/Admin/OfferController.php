<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->paginate(10);
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        Offer::create($validated);
        return redirect()->route('offers.index')->with('success', 'تمت إضافة العرض بنجاح.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $offer->update($validated);
        return redirect()->route('offers.index')->with('success', 'تم تحديث العرض بنجاح.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success', 'تم حذف العرض.');
    }
}
