@extends('layout')

@section('title', 'Edit House')

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

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
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
            <h2>✏️ Edit House</h2>
            <p style="color: #666;">Update house information</p>
        </div>

        <form action="{{ route('houses.update', $house->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="address">🏠 Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $house->address) }}" required>
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bedrooms">🛏️ Number of Bedrooms</label>
                <input type="number" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $house->bedrooms) }}" min="1"
                    max="10" required>
                @error('bedrooms')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="year_built">📅 Year Built</label>
                <input type="number" id="year_built" name="year_built" value="{{ old('year_built', $house->year_built) }}"
                    min="1800" max="{{ date('Y') }}" required>
                @error('year_built')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Save Changes</button>
                <a href="{{ route('houses.index') }}" class="btn btn-secondary">❌ Cancel</a>
            </div>
        </form>
    </div>
@endsection