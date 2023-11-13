const deleteFile = document.querySelector('.delete_file');
const btnDelete = document.querySelector('.delete');

btnDelete.addEventListener('click', () => {
  deleteFile.classList.remove('delete_file')
})