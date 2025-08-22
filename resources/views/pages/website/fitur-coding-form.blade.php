<x-form.modal size="lg" title="{{ __('translation.fitur-coding') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="judul" value="{{ $data->judul }}" label="Judul" />
            <x-form.textarea name="contoh" :value="old('contoh', $data->contoh)" label="contoh" rows="5" />
            <x-form.textarea name="deskripsi" :value="old('deskripsi', $data->deskripsi)" label="Deskripsi" rows="5" />
        </div>
    </div>
</x-form.modal>
