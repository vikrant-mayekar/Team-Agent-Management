<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Agent;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AgentController extends Controller
{
    public function index(): View
    {
        $agents = Agent::with('team')->latest()->paginate(10);
        return view('agents.index', compact('agents'));
    }

    public function create(): View
    {
        $teams = Team::where('status', 1)->orderBy('name')->get();
        return view('agents.create', compact('teams'));
    }

    public function store(StoreAgentRequest $request): RedirectResponse
    {
        Agent::create($request->validated());
        return redirect()->route('agents.index')->with('success', 'Agent created successfully.');
    }

    public function show(Agent $agent): View
    {
        $agent->load('team');
        return view('agents.show', compact('agent'));
    }

    public function edit(Agent $agent): View
    {
        $teams = Team::where('status', 1)->orderBy('name')->get();
        return view('agents.edit', compact('agent', 'teams'));
    }

    public function update(UpdateAgentRequest $request, Agent $agent): RedirectResponse
    {
        $agent->update($request->validated());
        return redirect()->route('agents.index')->with('success', 'Agent updated successfully.');
    }

    public function destroy(Agent $agent): RedirectResponse
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent deleted successfully.');
    }
}
