<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
class RentalController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,ACCEPTED,REJECTED,RETURNED',
            'deadline' => 'required|date|after_or_equal:now',
        ]);
 
        $rental = Borrow::findOrFail($id);
        $rental->status = $request->status;
        $rental->deadline = $request->deadline;
        $rental->save();
 
        return redirect()->route('rental.list', $rental->id)->with('success', 'Rental details updated successfully.');
    }
}