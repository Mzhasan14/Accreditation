@extends('layouts.validator')

@section('content')
    <h2>Pending Validations (Level {{ $level }})</h2>
    <table border="1" cellpadding="5">
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
                    <td>{{ $entry->status }}</td>
                    <td><a href="{{ route('validation.show', $entry->id) }}">Review</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
