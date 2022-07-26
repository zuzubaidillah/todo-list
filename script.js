const form = document.querySelector('#new-task-form');
const input = document.querySelector('#new-task-input');
const list_el = document.querySelector('#tasks');

input.focus();

form.addEventListener('submit', (e) => {

    const task = input.value;

    //cek jika isian masih kosong
    if (!task) {
        e.preventDefault();
        Swal.fire({
            icon: 'info',
            title: 'Pemberitahuan',
            text: 'masukan tugas terlebih dahulu!'
        })
        return;
    }
});