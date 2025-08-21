@extends('layouts.master')
@section('title')
    Riwayat Aplikasi
@endsection
@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.about')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-tambah dinamisBtn="true" can="create about/riwayat-aplikasi" route="about.riwayat-aplikasi.create"
                        label="Tambah" icon="ri-add-line" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'riwayataplikasi-table';

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
                            // simpan editor ke object editors
                            editors[el.id] = editor;

                            // tandai biar tidak di-init ulang
                            el.classList.add('ck-editor-applied');

                            // update textarea setiap ada perubahan
                            editor.model.document.on('change:data', () => {
                                el.value = editor.getData();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });

            // sebelum submit form, sinkronisasi data editor
            document.addEventListener("submit", function(e) {
                Object.keys(editors).forEach(id => {
                    const editor = editors[id];
                    const textarea = document.getElementById(id);
                    if (editor && textarea) {
                        textarea.value = editor.getData();
                    }
                });
            });

            // highlight code
            hljs.highlightAll();
        });


        handleDataTableEvents(datatable);
        handleAction(datatable, function(res) {
            select2Init();
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
