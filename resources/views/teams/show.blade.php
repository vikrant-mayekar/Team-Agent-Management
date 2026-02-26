@extends('layouts.app')

@section('title', 'Team Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Team Details</h2>
    <div class="d-flex gap-2">
        <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $team->name }}</dd>
            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $team->description ?? '—' }}</dd>
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
                @if($team->isActive())
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </dd>
        </dl>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h5 class="mb-0">Agents in this team</h5>
    <a href="{{ route('agents.create') }}?team_id={{ $team->id }}" class="btn btn-primary btn-sm">Add Agent</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($team->agents as $agent)
                    <tr>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>
                            @if($agent->isActive())
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('agents.show', $agent) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('agents.edit', $agent) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No agents in this team.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
