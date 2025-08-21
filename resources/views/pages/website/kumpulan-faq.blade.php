@extends('layouts.master')
@section('title')
    @lang('translation.faqs')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.web-site-app')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-tambah dinamisBtn="true" can="create websiteapp/kumpulan-faqs"
                        route="websiteapp.kumpulan-faqs.create" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <br>
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-3 mb-2">
        <div class="row justify-content-evenly mb-4">
            @foreach ($faqs as $kategori => $faqsByCategory)
                <!-- Loop through categories -->
                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-question-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">{{ $kategori }}</h5>
                                <!-- Display the category -->
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="genques-accordion-{{ $loop->index }}">
                            @foreach ($faqsByCategory as $key => $faq)
                                <!-- Loop through FAQs under this category -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header"
                                        id="genques-heading{{ $loop->parent->index }}-{{ $key }}">
                                        <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#genques-collapse{{ $loop->parent->index }}-{{ $key }}"
                                            aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                            aria-controls="genques-collapse{{ $loop->parent->index }}-{{ $key }}">
                                            {{ $faq->pertanyaan }} ? <!-- Display the question -->
                                        </button>
                                    </h2>
                                    <div id="genques-collapse{{ $loop->parent->index }}-{{ $key }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        aria-labelledby="genques-heading{{ $loop->parent->index }}-{{ $key }}"
                                        data-bs-parent="#genques-accordion-{{ $loop->index }}">
                                        <div class="accordion-body">
                                            {!! $faq->jawaban !!} <!-- Display the answer -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'kumpulanfaq-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script>
        let editors = {};

        document.addEventListener("DOMContentLoaded", () => {
            document.addEventListener('shown.bs.modal', function(event) {
                const el = event.target.querySelector('[id^="ckeditor-"]');
                if (el && !el.classList.contains('ck-editor-applied')) {
                    ClassicEditor
                        .create(el, {
                            //plugins: [Indent, IndentBlock, BlockQuote, /* ... */ ],
                            toolbar: {
                                items: [
                                    'undo', 'redo',
                                    '|',
                                    'heading',
                                    '|',
                                    'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                                    '|',
                                    'bold', 'italic', 'strikethrough', 'subscript', 'superscript',
                                    'code',
                                    '|',
                                    'link', 'uploadImage', 'blockQuote', 'codeBlock',
                                    '|',
                                    'alignment',
                                    '|',
                                    'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                                ],
                                shouldNotGroupWhenFull: true
                            },
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
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
