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

    public function template(Request $request)
    {

        return view('pages.dashboadtest');
    }


    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Campaign::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully!');
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
        $campaign->archived = true;
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
