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

const value_input = {
    keterangan: ''
}

function click_edit(ev) {
    // console.log(ev);
    let id = ev.target.dataset.id;
    console.log(id);

    label_edit(id)
}

function label_edit(id) {

    let inp = document.getElementById(`txtketerangan_${id}`);
    inp.removeAttribute('readonly');
    inp.select();
    value_input.keterangan = inp.value;
    console.log(inp.value);

    let del = document.getElementById(`btndelete_${id}`);
    del.innerHTML = 'Batal';
    del.setAttribute('onclick', `click_batal('${id}')`);

    let edi = document.getElementById(`btnedit_${id}`);
    edi.innerHTML = 'Simpan';
    edi.setAttribute('onclick', `click_update('${id}')`);
}

function click_batal(id) {
    label_simpan(id);
}

function label_simpan(id) {
    let inp = document.getElementById(`txtketerangan_${id}`);
    inp.setAttribute('readonly', true);
    inp.value = value_input.keterangan;

    let del = document.getElementById(`btndelete_${id}`);
    del.innerHTML = 'HAPUS';
    del.setAttribute('onclick', `click_hapus('${id}')`);

    let edi = document.getElementById(`btnedit_${id}`);
    edi.innerHTML = 'EDIT';
    edi.setAttribute('onclick', `click_edit(event)`);
}

function click_update(id) {
    let inp = document.getElementById(`txtketerangan_${id}`);
    //cek jika isian masih kosong
    if (!inp.value) {
        Swal.fire({
            icon: 'info',
            title: 'Pemberitahuan',
            text: 'masukan tugas terlebih dahulu!'
        }).then(() => {
            inp.focus();
        });
        return;
    }
    proses_update(id, inp.value)
}

function proses_update(id, ket) {
    const form = document.createElement('form');
    form.method = "POST";
    form.action = `${base_url}api/proses_update_tugas.php`;

    const hiddenField = document.createElement('input');
    hiddenField.type = 'hidden';
    hiddenField.name = "txtid";
    hiddenField.value = id;
    form.appendChild(hiddenField);

    const hiddenFieldKet = document.createElement('input');
    hiddenFieldKet.type = 'hidden';
    hiddenFieldKet.name = "txttugas";
    hiddenFieldKet.value = ket;
    form.appendChild(hiddenFieldKet);

    document.body.appendChild(form);
    form.submit();
}

function click_hapus(id) {
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Yakin ingin menghapus data ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
        if (result.isConfirmed) {
            proses_hapus(id);
        }
    })
}

function proses_hapus(id) {
    const form = document.createElement('form');
    form.method = "post";
    form.action = `${base_url}api/proses_hapus_tugas.php`;

    const hiddenFieldId = document.createElement('input');
    hiddenFieldId.type = 'hidden';
    hiddenFieldId.name = "txtid";
    hiddenFieldId.value = id;
    form.appendChild(hiddenFieldId);

    document.body.appendChild(form);
    form.submit();
}