document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('images');
    const preview = document.getElementById('preview');
    const dataTransfer = new DataTransfer();

    input.addEventListener('change', function () {
        preview.innerHTML = '';
        dataTransfer.clearData();

        Array.from(input.files).forEach((file, index) => {
            if (!file.type.startsWith('image/')) return;

            dataTransfer.items.add(file);

            const col = document.createElement('div');
            col.className = "col-md-3 mb-2 position-relative";

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = "img-fluid rounded border";

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = '&times;';
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 m-1 rounded-circle';
            removeBtn.style.width = '25px';
            removeBtn.style.height = '25px';

            removeBtn.onclick = () => {
                dataTransfer.items.remove(index);
                input.files = dataTransfer.files;
                col.remove();
            };

            col.appendChild(img);
            col.appendChild(removeBtn);
            preview.appendChild(col);
        });

        input.files = dataTransfer.files;
    });
});
