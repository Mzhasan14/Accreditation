@extends('layouts.validator')

@section('content')
    <style>
        .entry-review {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 24px;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
        }

        .entry-review h2 {
            font-size: 26px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .entry-review p {
            font-size: 16px;
            margin-bottom: 12px;
            color: #34495e;
        }

        .entry-review strong {
            color: #2c3e50;
        }

        .entry-review a {
            color: #2980b9;
            text-decoration: none;
        }

        .entry-review a:hover {
            text-decoration: underline;
        }

        .entry-review img {
            border-radius: 8px;
            margin-top: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .entry-review form {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .entry-review label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            margin-top: 16px;
            color: #2c3e50;
        }

        .entry-review select,
        .entry-review textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .entry-review textarea {
            resize: vertical;
        }

        .entry-review .error {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 4px;
        }

        .entry-review button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .entry-review button:hover {
            background-color: #1abc9c;
        }

        .entry-review .error-list {
            background-color: #fdecea;
            border-left: 4px solid #e74c3c;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .entry-review .error-list ul {
            margin: 0;
            padding-left: 20px;
        }

        .entry-review .error-list li {
            font-size: 14px;
            color: #e74c3c;
        }
    </style>

    <div class="entry-review">
        <h2>Review Entry: {{ $entry->title }}</h2>

        <p><strong>Section:</strong> {{ $entry->section->name }}</p>
        <p><strong>Description:</strong> {{ $entry->description }}</p>
        <p><strong>Link:</strong> <a href="{{ $entry->link }}" target="_blank">{{ $entry->link }}</a></p>

        @if ($entry->photo_path)
            <p><img src="{{ asset('storage/' . $entry->photo_path) }}" width="200" alt="Entry Photo"></p>
        @endif

        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('validation.process', $entry->id) }}" method="POST">
            @csrf

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">-- Choose Status --</option>
                <option value="accepted" {{ old('status') === 'accepted' ? 'selected' : '' }}>Accept</option>
                <option value="revised" {{ old('status') === 'revised' ? 'selected' : '' }}>Revised</option>
                <option value="rejected" {{ old('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="comments">Comments</label>
            <textarea name="comments" id="comments" rows="4">{{ old('comments') }}</textarea>
            @error('comments')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Submit Validation</button>
        </form>
    </div>
@endsection
