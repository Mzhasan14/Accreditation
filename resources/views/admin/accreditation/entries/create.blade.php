@extends('layouts.admin')

@section('content')
    <style>
        .entry-create-wrapper {
            max-width: 900px;
            margin: 1px auto 60px;
            padding: 25px 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fdfdfd;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .entry-create-wrapper h2 {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #2c3e50;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        .entry-create-wrapper .alert {
            margin-bottom: 25px;
            padding: 16px;
            background-color: #ffe8e8;
            border-left: 5px solid #e3342f;
            border-radius: 5px;
            color: #721c24;
        }

        .entry-create-wrapper form {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .entry-create-wrapper fieldset {
            border: 1px solid #d1d1d1;
            border-radius: 8px;
            padding: 20px 25px;
            background-color: #fff;
        }

        .entry-create-wrapper legend {
            font-weight: bold;
            font-size: 18px;
            padding: 0 8px;
            color: #34495e;
        }

        .entry-create-wrapper label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
            color: #333;
        }

        .entry-create-wrapper input[type="text"],
        .entry-create-wrapper input[type="url"],
        .entry-create-wrapper input[type="file"],
        .entry-create-wrapper textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        .entry-create-wrapper input:focus,
        .entry-create-wrapper textarea:focus {
            outline: none;
            border-color: #007bff;
            background-color: #fff;
        }

        .entry-create-wrapper textarea {
            resize: vertical;
            min-height: 90px;
        }

        .entry-create-wrapper button {
            align-self: flex-start;
            background-color: #007bff;
            color: white;
            padding: 12px 26px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 123, 255, 0.4);
            transition: background-color 0.3s ease;
        }

        .entry-create-wrapper button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="entry-create-wrapper">
        <h2>Create New Entries for {{ $criteria->name }}</h2>

        @if (session('comment'))
            <div class="alert">
                <strong>Catatan dari Validator:</strong>
                <p>{{ session('comment') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('entries.store.by.criteria', $criteria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach ($sections as $section)
                <fieldset>
                    <legend>{{ $section->name }}</legend>

                    <input type="hidden" name="section_ids[]" value="{{ $section->id }}">

                    <label for="description_{{ $section->id }}">Description</label>
                    <textarea name="descriptions[{{ $section->id }}]" id="description_{{ $section->id }}"
                        placeholder="Masukkan deskripsi..." required>{{ old("descriptions.{$section->id}") }}</textarea>

                    <label for="link_{{ $section->id }}">Link</label>
                    <input type="url" name="links[{{ $section->id }}]" id="link_{{ $section->id }}"
                        value="{{ old("links.{$section->id}") }}" placeholder="https://example.com">

                    <label for="photo_{{ $section->id }}">Photo</label>
                    <input type="file" name="photos[{{ $section->id }}]" id="photo_{{ $section->id }}">
                </fieldset>
            @endforeach

            <button type="submit">Save All</button>
        </form>
    </div>
@endsection
