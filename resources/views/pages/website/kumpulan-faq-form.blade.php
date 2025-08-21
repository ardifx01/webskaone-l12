<x-form.modal size="lg" title="{{ __('translation.faqs') }}" action="{{ $action ?? null }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-md-12">
            <x-form.select name="kategori" :options="['Guru' => 'Guru', 'Wali Kelas' => 'Wali Kelas', 'Peserta Didik' => 'Peserta Didik']" value="{{ old('kategori', $data->kategori) }}"
                label="Kategori" />
            <x-form.input name="pertanyaan" value="{{ $data->pertanyaan }}" label="Pertanyaan" />
            <x-form.textarea id="ckeditor-{{ $data->id ?? 'new' }}" name="jawaban" :value="old('jawaban', $data->jawaban)" label="Jawaban"
                rows="5" />
        </div>
    </div>
</x-form.modal>
