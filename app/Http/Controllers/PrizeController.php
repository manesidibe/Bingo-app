<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Campaign;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function index()
{
    $campaigns = Campaign::all(); // Récupérer toutes les campagnes
    $prizes = Prize::where('archived', false)->get(); // Récupère seulement les prix non archivés
    return view('prizes.index', compact('prizes', 'campaigns'));
}

    public function create()
    {
        // Récupérer toutes les campagnes
        $campaigns = Campaign::all();

        // Retourner la vue avec les campagnes
        return view('prizes.create', compact('campaigns'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'campaign_id' => 'required|exists:campaigns,id',
        ]);

        Prize::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'campaign_id' => $request->input('campaign_id'),
        ]);

        return redirect()->route('prizes.index')->with('success', 'Prize created successfully!');
    }

    // PrizeController.php
    public function archive($id)
    {
        $prize = Prize::findOrFail($id);
        $prize->archived = true; // Met à jour le champ 'archived'
        $prize->save();

        return response()->json(['message' => 'Prize archived successfully!']);
    }



    public function archivedPrizes()
    {
        $prizes = Prize::where('archived', true)->get();
        return view('prizes.archived', compact('prizes'));
    }
    // PrizeController.php
    public function edit($id)
    {
        $prize = Prize::findOrFail($id);
        return response()->json($prize);
    }
// PrizeController.php
    public function update(Request $request, $id)
    {
        $prize = Prize::findOrFail($id);
        $prize->update($request->all());
        return redirect()->route('prizes.index');
    }



    public function restore($id)
    {
        \Log::info("Restoring prize with ID: {$id}"); // Ajoutez ce journal pour vérifier que la méthode est appelée

        $prize = Prize::find($id);

        if ($prize) {
            $prize->archived = false; // Assurez-vous que cette colonne est correcte
            $prize->save();

            return response()->json(['success' => true, 'message' => 'Prize restored successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Prize not found'], 404);
    }


}
