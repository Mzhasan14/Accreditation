@extends('layouts.validator')

@section('content')
    <h2>Review Entry: {{ $entry->title }}</h2>

    <p><strong>Section:</strong> {{ $entry->section->name }}</p>
    <p><strong>Description:</strong> {{ $entry->description }}</p>
    <p><strong>Link:</strong> <a href="{{ $entry->link }}" target="_blank">{{ $entry->link }}</a></p>

    @if ($entry->photo_path)
        <p><img src="{{ asset('storage/' . $entry->photo_path) }}" width="200" alt="Entry Photo"></p>
    @endif

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('validation.process', $entry->id) }}" method="POST">
        @csrf

        <div>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="">-- Choose Status --</option>
                <option value="accepted" {{ old('status') === 'accepted' ? 'selected' : '' }}>Accept</option>
                <option value="revised" {{ old('status') === 'revised' ? 'selected' : '' }}>Revisi</option>
                <option value="rejected" {{ old('status') === 'rejected' ? 'selected' : '' }}>Tolak</option>
            </select>
            @error('status')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="comments">Comments</label><br>
            <textarea name="comments" id="comments" rows="4" cols="50">{{ old('comments') }}</textarea>
            @error('comments')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit">Submit Validation</button>
    </form>
@endsection
