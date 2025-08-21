<x-form.modal size="lg" title="{{ __('translation.fitur-coding') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="judul" value="{{ $data->judul }}" label="Judul" />
            <x-form.textarea id="ckeditor-{{ $data->id ?? 'new' }}" name="deskripsi" :value="old('deskripsi', $data->deskripsi)" label="Deskripsi"
                rows="5" />
            <x-form.textarea id="ckeditor-{{ $data->id ?? 'new' }}" name="contoh" :value="old('contoh', $data->contoh)" label="contoh"
                rows="5" />

            {{--
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5">{{ $data->deskripsi }}</textarea>
            <label for="contoh" class="form-label">Jawaban</label>
            <textarea name="contoh" class="form-control" id="contoh" rows="5">{{ $data->contoh }}</textarea> --}}
        </div>
    </div>
</x-form.modal>
