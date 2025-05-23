@extends('layouts.admin')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 25px 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container h2 {
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }

        .label {
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        .value-box {
            padding: 10px 12px;
            background: #f5f5f5;
            border-radius: 5px;
            color: #555;
            margin-bottom: 20px;
            white-space: pre-wrap;
        }

        .alert-comment {
            background-color: #ffe8e8;
            border-left: 6px solid #e3342f;
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 4px;
            color: #b62d2d;
            font-weight: 600;
        }

        .current-photo {
            max-width: 200px;
            border-radius: 6px;
            margin-bottom: 15px;
            display: block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="form-container">
        <h2>Detail Entry: {{ $entry->section->name }}</h2>

        @if (isset($comment) && $comment)
            <div class="alert-comment">
                <strong>Catatan dari Validator:</strong>
                <p>{{ $comment }}</p>
            </div>
        @endif

        <div>
            <div class="label">Section</div>
            <div class="value-box">{{ $entry->section->name }}</div>

            <div class="label">Title</div>
            <div class="value-box">{{ $entry->title }}</div>

            <div class="label">Description</div>
            <div class="value-box">{{ $entry->description }}</div>

            <div class="label">Link</div>
            <div class="value-box">
                <a href="{{ $entry->link }}" target="_blank">{{ $entry->link }}</a>
            </div>

            <div class="label">Photo</div>
            @if ($entry->photo)
                <img src="{{ asset('storage/' . $entry->photo) }}" alt="Current Photo" class="current-photo">
            @else
                <p><em>Tidak ada foto saat ini.</em></p>
            @endif
        </div>
    </div>
@endsection
