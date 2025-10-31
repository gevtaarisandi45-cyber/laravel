@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tambah Tugas</h2>
    <form action="{{ route('tugas.store') }}" method="POST">
        @include('tugas.form')
    </form>
</div>
@endsection
