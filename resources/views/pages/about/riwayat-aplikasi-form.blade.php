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
<script>
    let editors = {};

    document.addEventListener("DOMContentLoaded", () => {
        document.addEventListener('shown.bs.modal', function(event) {
            const el = event.target.querySelector('[id^="ckeditor-"]');
            if (el && !el.classList.contains('ck-editor-applied')) {
                ClassicEditor
                    .create(el, {
                        toolbar: [
                            'heading', '|',
                            'bold', 'italic', 'underline', '|',
                            'link', 'bulletedList', 'numberedList', '|',
                            'code', 'codeBlock', '|',
                            'undo', 'redo'
                        ],
                        codeBlock: {
                            languages: [{
                                    language: 'plaintext',
                                    label: 'Plain text'
                                },
                                {
                                    language: 'javascript',
                                    label: 'JavaScript'
                                },
                                {
                                    language: 'php',
                                    label: 'PHP'
                                },
                                {
                                    language: 'html',
                                    label: 'HTML'
                                },
                                {
                                    language: 'css',
                                    label: 'CSS'
                                }
                            ]
                        }
                    })
                    .then(editor => {
                        editors[el.id] = editor; // simpan editor instance
                        el.classList.add('ck-editor-applied');
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });

        // sebelum submit form, update value textarea
        document.addEventListener("submit", function(e) {
            Object.keys(editors).forEach(id => {
                const editor = editors[id];
                const textarea = document.getElementById(id);
                if (editor && textarea) {
                    textarea.value = editor.getData();
                }
            });
        });

        hljs.highlightAll();
    });
</script>
