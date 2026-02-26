@extends('layouts.app')

@section('title', 'Agents')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Agents</h2>
    <a href="{{ route('agents.create') }}" class="btn btn-primary">Add Agent</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Team</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agents as $agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>{{ $agent->team?->name ?? '—' }}</td>
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
                            <form action="{{ route('agents.destroy', $agent) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this agent?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No agents yet. <a href="{{ route('agents.create') }}">Add Agent</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($agents->hasPages())
            <div class="d-flex justify-content-center mt-3">
                {{ $agents->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
