@extends('layouts.admin')

@section('content')
    <style>
        /* Container */
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 25px 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Heading */
        .form-container h2 {
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }

        /* Alert */
        .alert-comment {
            background-color: #ffe8e8;
            border-left: 6px solid #e3342f;
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 4px;
            color: #b62d2d;
            font-weight: 600;
        }

        /* Label */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        /* Inputs & Select & Textarea */
        input[type="text"],
        input[type="url"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1.8px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
            font-family: inherit;
            resize: vertical;
        }

        input[type="text"]:focus,
        input[type="url"]:focus,
        select:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #2e86de;
            outline: none;
            box-shadow: 0 0 6px #a1caff;
        }

        /* Image preview */
        .current-photo {
            max-width: 200px;
            border-radius: 6px;
            margin-bottom: 15px;
            display: block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Button */
        button[type="submit"] {
            display: inline-block;
            background-color: #2e86de;
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 6px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #1b4f91;
        }
    </style>

    <div class="form-container">
        <h2>Edit Entry</h2>

        @if (isset($comment) && $comment)
            <div class="alert-comment">
                <strong>Catatan dari Validator:</strong>
                <p>{{ $comment }}</p>
            </div>
        @endif

        <form action="{{ route('entries.update', $entry->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <label for="section_id">Section</label>
            <p style="padding: 10px 12px; background: #f5f5f5; border-radius: 5px; color: #555; margin-bottom: 20px;">
                {{ $entry->section->name }}
            </p>
            <input type="hidden" name="section_id" value="{{ $entry->section_id }}">

            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $entry->title) }}" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" required>{{ old('description', $entry->description) }}</textarea>

            <label for="link">Link</label>
            <input type="url" id="link" name="link" value="{{ old('link', $entry->link) }}"
                placeholder="https://example.com" required>

            <label>Current Photo</label>
            @if ($entry->photo)
                <img src="{{ asset('storage/' . $entry->photo) }}" alt="Current Photo" class="current-photo">
            @else
                <p><em>Tidak ada foto saat ini.</em></p>
            @endif

            <label for="photo">Upload New Photo</label>
            <input type="file" id="photo" name="photo" accept="image/*">

            <button type="submit">Update</button>
        </form>
    </div>
@endsection
