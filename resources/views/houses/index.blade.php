@extends('layout')

@section('title', 'All Houses')

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

        .houses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .house-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .house-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .house-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .house-address {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .house-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 0.95rem;
        }

        .detail-label {
            font-weight: 600;
            color: #667eea;
        }

        .tenants-section {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #e9ecef;
        }

        .tenants-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #667eea;
            margin-bottom: 8px;
        }

        .tenant-list {
            list-style: none;
            padding-left: 0;
        }

        .tenant-item {
            padding: 5px 0;
            color: #666;
            font-size: 0.9rem;
        }

        .no-tenants {
            color: #999;
            font-style: italic;
            font-size: 0.9rem;
        }

        .card-actions {
            margin-top: 20px;
        }
    </style>

    <div class="page-header">
        <h2>🏘️ All Houses</h2>
        <p style="color: #666;">Manage your rental properties</p>
    </div>

    <div class="houses-grid">
        @forelse($houses as $house)
            <div class="house-card">
                <div class="house-icon">🏠</div>
                <div class="house-address">{{ $house->address }}</div>

                <div class="house-details">
                    <div class="detail-item">
                        <span class="detail-label">🛏️ Bedrooms:</span>
                        <span>{{ $house->bedrooms }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">📅 Year Built:</span>
                        <span>{{ $house->year_built }}</span>
                    </div>
                </div>

                <div class="tenants-section">
                    <div class="tenants-title">👥 Current Tenants</div>
                    @if($house->tenants->count() > 0)
                        <ul class="tenant-list">
                            @foreach($house->tenants as $tenant)
                                <li class="tenant-item">• {{ $tenant->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="no-tenants">No tenants currently</p>
                    @endif
                </div>

                <div class="card-actions">
                    <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-primary">
                        ✏️ Edit House
                    </a>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #999;">
                <p style="font-size: 1.2rem;">No houses found. Please run the seeder to populate data.</p>
            </div>
        @endforelse
    </div>
@endsection