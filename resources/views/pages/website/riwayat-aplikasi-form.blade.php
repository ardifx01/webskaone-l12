<x-form.modal size="lg" title="{{ __('translation.riwayat-aplikasi') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="judul" value="{{ $data->judul }}" label="Judul" />
        </div>
        <div class="col-md-12">
            <x-form.input name="sub_judul" value="{{ $data->sub_judul }}" label="Sub Judul" />
        </div>
        <x-form.textarea id="ckeditor-{{ $data->id ?? 'new' }}" name="deskripsi" :value="old('deskripsi', $data->deskripsi)" label="Deskripsi"
            rows="5" />
    </div>
</x-form.modal>
