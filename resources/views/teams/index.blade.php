@extends('layouts.app')

@section('title', 'Teams')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Teams</h2>
    <a href="{{ route('teams.create') }}" class="btn btn-primary">Add Team</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ Str::limit($team->description, 50) }}</td>
                        <td>
                            @if($team->isActive())
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('teams.show', $team) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('teams.destroy', $team) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this team?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No teams yet. <a href="{{ route('teams.create') }}">Add Team</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($teams->hasPages())
            <div class="d-flex justify-content-center mt-3">
                {{ $teams->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
