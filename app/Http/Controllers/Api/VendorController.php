<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        // Récupère tous les vendeurs
        $vendors = Vendor::all();
        return response()->json($vendors);
    }

    public function store(Request $request)
    {
        // Valide les données
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'required|string',
        ]);

        // Crée un nouveau vendeur
        $vendor = Vendor::create($validatedData);
        return response()->json($vendor, 201);
    }

    public function show($id)
    {
        // Récupère un vendeur spécifique
        $vendor = Vendor::findOrFail($id);
        return response()->json($vendor);
    }

    public function update(Request $request, $id)
    {
        // Valide les données
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'required|string',
        ]);

        // Met à jour le vendeur spécifique
        $vendor = Vendor::findOrFail($id);
        $vendor->update($validatedData);
        return response()->json($vendor);
    }

    public function destroy($id)
    {
        // Supprime le vendeur spécifique
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        return response()->json(null, 204);
    }
}
