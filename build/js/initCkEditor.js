    let editors = {};

    function initCkEditor(modalElement = document) {
        const elements = modalElement.querySelectorAll('[id^="ckeditor-"]');

        elements.forEach(el => {
            if (el && !el.classList.contains('ck-editor-applied')) {
                ClassicEditor
                    .create(el, {
                        toolbar: {
                            items: [
                                'undo', 'redo',
                                '|',
                                'heading',
                                '|',
                                'fontfamily', 'fontsize', 'fontColor',
                                'fontBackgroundColor', 'uploadImage',
                                '|',
                                'bold', 'italic', 'link',
                                '|',
                                'bulletedList', 'numberedList',
                                '|',
                                'blockQuote', 'codeBlock', 'strikethrough',
                                'subscript', 'superscript',
                                'code',
                                'alignment',
                                'todoList',
                                'outdent', 'indent'
                            ],
                            shouldNotGroupWhenFull: true
                        },
                        codeBlock: {
                            languages: [
                                { language: 'plaintext', label: 'Plain text' },
                                { language: 'javascript', label: 'JavaScript' },
                                { language: 'php', label: 'PHP' },
                                { language: 'html', label: 'HTML' },
                                { language: 'css', label: 'CSS' }
                            ]
                        }
                    })
                    .then(editor => {
                        editors[el.id] = editor;
                        el.classList.add('ck-editor-applied');
                        editor.model.document.on('change:data', () => {
                            el.value = editor.getData();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        // Trigger init saat modal bootstrap terbuka
        document.addEventListener('shown.bs.modal', function(event) {
            initCkEditor(event.target);
        });

        // Sebelum submit form, sinkronisasi semua editor
        document.addEventListener("submit", function(e) {
            Object.keys(editors).forEach(id => {
                const editor = editors[id];
                const textarea = document.getElementById(id);
                if (editor && textarea) {
                    textarea.value = editor.getData();
                }
            });
        });

        // Highlight code
        hljs.highlightAll();
    });
