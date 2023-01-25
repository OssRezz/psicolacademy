ClassicEditor.create(document.querySelector("#descripcion"), {
    toolbar: [
        "heading",
        "bold",
        "italic",
        "|",
        "numberedList",
        "bulletedList",
        "|",
        "insertTable",
        "blockQuote",
    ],
})
    .then((newEditor) => {
        editor = newEditor;
    })
    .catch((error) => {
        console.error(error);
    });
