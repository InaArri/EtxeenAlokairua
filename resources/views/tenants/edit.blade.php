@extends('layout')

@section('title', 'Edit Tenant')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h2 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error {
            color: #f5576c;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
    </style>

    <div class="form-container">
        <div class="page-header">
            <h2>✏️ Edit Tenant</h2>
            <p style="color: #666;">Update tenant information</p>
        </div>

        <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">👤 Tenant Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $tenant->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="house_id">🏠 Rented House</label>
                <select id="house_id" name="house_id">
                    <option value="">-- No House Assigned --</option>
                    @foreach($houses as $house)
                        <option value="{{ $house->id }}" {{ old('house_id', $tenant->house_id) == $house->id ? 'selected' : '' }}>
                            {{ $house->address }}
                        </option>
                    @endforeach
                </select>
                @error('house_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Save Changes</button>
                <a href="{{ route('tenants.index') }}" class="btn btn-secondary">❌ Cancel</a>
            </div>
        </form>
    </div>
@endsection