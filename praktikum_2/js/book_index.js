function editBook(bookIsbn) {
    window.location = "index.php?menu=book_update&gid= " + bookIsbn;
}

function deleteBook(bookIsbn) {
    const confirmation = window.confirm("Are you sure want to delete this data?")
    if (confirmation) {
        window.location = "index.php?menu=book&cmd=del&gid=" + bookIsbn;
    }
}