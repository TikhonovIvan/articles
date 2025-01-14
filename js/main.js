// Initialize CKEditor
ClassicEditor
    .create(document.querySelector('textarea'))
    .then(editor => {
        console.log('Editor was initialized', editor);
    })
    .catch(error => {
        console.error('Error during initialization of the editor', error);
    });