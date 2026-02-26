@extends('layouts.app')

@section('title', 'Agent Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Agent Details</h2>
    <div class="d-flex gap-2">
        <a href="{{ route('agents.edit', $agent) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('agents.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $agent->name }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $agent->email }}</dd>
            <dt class="col-sm-3">Phone</dt>
            <dd class="col-sm-9">{{ $agent->phone }}</dd>
            <dt class="col-sm-3">Team</dt>
            <dd class="col-sm-9">
                @if($agent->team)
                    <a href="{{ route('teams.show', $agent->team) }}">{{ $agent->team->name }}</a>
                @else
                    —
                @endif
            </dd>
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
                @if($agent->isActive())
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </dd>
        </dl>
    </div>
</div>
@endsection
