@extends('layouts.admin')

@section('content')
    <style>
        .accreditation-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .accreditation-wrapper .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .accreditation-wrapper .header h2 {
            font-size: 24px;
            font-weight: 600;
        }

        .accreditation-wrapper .btn-add {
            background-color: #007bff;
            color: #fff;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .accreditation-wrapper .btn-add:hover {
            background-color: #0056b3;
        }

        .accreditation-wrapper table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        }

        .accreditation-wrapper th,
        .accreditation-wrapper td {
            padding: 14px 16px;
            text-align: left;
        }

        .accreditation-wrapper thead {
            background-color: #f4f4f4;
        }

        .accreditation-wrapper tr:hover {
            background-color: #f9f9f9;
        }

        .accreditation-wrapper .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: bold;
            display: inline-block;
        }

        .accreditation-wrapper .status-draft {
            background-color: #fff3cd;
            color: #856404;
        }

        .accreditation-wrapper .status-published {
            background-color: #d4edda;
            color: #155724;
        }

        .accreditation-wrapper .action-buttons a,
        .accreditation-wrapper .action-buttons button {
            margin-right: 8px;
            font-size: 14px;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .accreditation-wrapper .action-buttons a {
            background-color: #17a2b8;
            color: #fff;
        }

        .accreditation-wrapper .action-buttons a:hover {
            background-color: #117a8b;
        }

        .accreditation-wrapper .action-buttons button {
            background-color: #28a745;
            color: #fff;
        }

        .accreditation-wrapper .action-buttons button:hover {
            background-color: #218838;
        }

        .accreditation-wrapper form {
            display: inline;
        }
    </style>

    <div class="accreditation-wrapper">
        <div class="header">
            <h2>My Accreditation Entries</h2>
            <a href="{{ route('entries.create.by.criteria', $criteria->id) }}" class="btn-add">+ Add New Entry</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->section->name }}</td>
                        <td>
                            <span
                                class="status-badge {{ $entry->status === 'draft' ? 'status-draft' : 'status-published' }}">
                                {{ ucfirst($entry->status) }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('show', $entry->id) }}">View</a>

                            @if ($entry->status === 'draft' || $entry->status === 'revised')
                                <a href="{{ route('entries.edit', $entry->id) }}">Edit</a>

                                <form id="submit-form-{{ $entry->id }}" action="{{ route('entries.submit', $entry->id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    <button type="button" onclick="confirmSubmit({{ $entry->id }})">Submit</button>
                                </form>
                            @else
                                <span style="color: gray;">No actions available</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
