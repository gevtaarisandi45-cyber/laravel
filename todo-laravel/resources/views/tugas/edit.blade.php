@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Tugas</h2>
    <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
        @method('PUT')
        @include('tugas.form')
    </form>
</div>
@endsection
