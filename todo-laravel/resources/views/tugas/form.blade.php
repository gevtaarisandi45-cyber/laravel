@csrf
<label>Nama</label><br>
<input type="text" name="nama" value="{{ old('nama', $tugas->nama ?? '') }}" required><br><br>

<label>Tugas</label><br>
<textarea name="tugas" required>{{ old('tugas', $tugas->tugas ?? '') }}</textarea><br><br>

<label>Deadline</label><br>
<input type="date" name="deadline" value="{{ old('deadline', isset($tugas) ? $tugas->deadline->format('Y-m-d') : '') }}" required><br><br>

@if(isset($tugas))
<label>Status</label><br>
<select name="status">
    <option value="belum selesai" {{ (old('status', $tugas->status)=='belum selesai')?'selected':'' }}>belum selesai</option>
    <option value="selesai" {{ (old('status', $tugas->status)=='selesai')?'selected':'' }}>selesai</option>
</select><br><br>
@endif

<button type="submit">Simpan</button>
