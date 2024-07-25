<?php
namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('search');
            $campaigns = Campaign::query()
                ->where('archived', false) // Exclude archived campaigns
                ->where(function($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                })
                ->get();

            return response()->json([
                'success' => true,
                'html' => view('campaigns.partials.campaigns_list', compact('campaigns'))->render()
            ]);
        }

        // Non-AJAX request
        $campaigns = Campaign::where('archived', false)->get();
        return view('campaigns.dashboard', compact('campaigns'));
    }



    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $campaign = new Campaign();
        $campaign->fill($request->all());
        $campaign->save();

        return redirect()->route('campaigns.index');
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->update($request->all());
        return redirect()->route('campaigns.index')->with('status', 'Campaign updated successfully!');
    }

    public function archive($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->archived = true; // Assurez-vous que ce champ existe dans votre table
        $campaign->save();

        return response()->json(['message' => 'Campaign archived successfully!']);
    }
    public function archivedCampaigns()
    {
        $campaigns = Campaign::where('archived', true)->get();
        return view('campaigns.archived', compact('campaigns'));
    }
    public function restore($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->archived = false;
        $campaign->save();

        return response()->json(['success' => true]);
    }

}
