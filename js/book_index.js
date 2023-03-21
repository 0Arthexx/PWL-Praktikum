function editCover(isbna) {
  window.location = "index.php?menu=cover_update&isbna=" + isbna;
}
function editBook(isbn) {
  window.location = "index.php?menu=book_update&isbn=" + isbn;
}
function deleteBook(idb) {
  let confirmation = window.confirm("Are you sure want to delete this data?");
  if (confirmation) {
    window.location = "index.php?menu=book&comd=dele&idb=" + idb;
  }
}
