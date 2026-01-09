@extends('layout')

@section('title', 'All Tenants')

@section('content')
    <style>
        .page-header {
            margin-bottom: 30px;
        }

        .page-header h2 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .tenants-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .tenants-table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .tenants-table thead th:first-child {
            border-radius: 10px 0 0 10px;
        }

        .tenants-table thead th:last-child {
            border-radius: 0 10px 10px 0;
        }

        .tenants-table tbody tr {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .tenants-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
        }

        .tenants-table tbody td {
            padding: 18px 15px;
            color: #333;
        }

        .tenants-table tbody td:first-child {
            border-radius: 10px 0 0 10px;
            font-weight: 600;
        }

        .tenants-table tbody td:last-child {
            border-radius: 0 10px 10px 0;
        }

        .house-badge {
            display: inline-block;
            padding: 6px 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .no-house {
            color: #999;
            font-style: italic;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
    </style>

    <div class="page-header">
        <h2>👥 All Tenants</h2>
        <p style="color: #666;">Manage tenant information</p>
    </div>

    @if($tenants->count() > 0)
        <table class="tenants-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Rented House</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->name }}</td>
                        <td>
                            @if($tenant->house)
                                <span class="house-badge">🏠 {{ $tenant->house->address }}</span>
                            @else
                                <span class="no-house">No house assigned</span>
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-primary">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this tenant?')">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">👥</div>
            <p style="font-size: 1.2rem;">No tenants found. Please run the seeder to populate data.</p>
        </div>
    @endif
@endsection