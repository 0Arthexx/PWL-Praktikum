function editBook(bookIsbn) {
    window.location = "index.php?menu=book_update&bisbn=" + bookIsbn;
}

function deleteBook(bookIsbn) {
    const confirmation = window.confirm("Are you sure want to delete this data?")
    if (confirmation) {
        window.location = "index.php?menu=book&cmd=del&bisbn=" + bookIsbn;
    }
}