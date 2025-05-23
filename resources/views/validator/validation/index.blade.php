@extends('layouts.validator')

@section('content')
    <style>
        .pending-validations {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f4f6f8;
        }

        .pending-validations h2 {
            font-size: 26px;
            color: #2c3e50;
            margin-bottom: 24px;
            font-weight: 600;
        }

        .pending-validations table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .pending-validations thead {
            background-color: #34495e;
            color: #ecf0f1;
        }

        .pending-validations th,
        .pending-validations td {
            padding: 14px 20px;
            text-align: left;
            font-size: 15px;
        }

        .pending-validations tbody tr:nth-child(even) {
            background-color: #f9fbfc;
        }

        .pending-validations tbody tr:hover {
            background-color: #ecf0f1;
            transition: background 0.3s ease;
        }

        .pending-validations a {
            color: #2980b9;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .pending-validations a:hover {
            color: #1abc9c;
            text-decoration: underline;
        }

        .pending-validations td:last-child a {
            display: inline-block;
            padding: 6px 12px;
            background-color: #2980b9;
            color: white;
            border-radius: 6px;
            font-size: 14px;
        }

        .pending-validations td:last-child a:hover {
            background-color: #1abc9c;
        }
    </style>

    <div class="pending-validations">
        <h2>
        Pending Validations (Level {{ $level }})
        @if ($entries->isNotEmpty() && $entries->first()->section?->criteria?->name)
            - {{ $entries->first()->section->criteria->name }}
        @endif
    </h2>

        <table>
            <thead>
                <tr>
                    <th>Criteria</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->section->criteria->name ?? '-' }}</td>
                        <td>{{ $entry->section->name }}</td>
                        <td>{{ ucfirst($entry->status) }}</td>
                        <td><a href="{{ route('validation.show', $entry->id) }}">Review</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
