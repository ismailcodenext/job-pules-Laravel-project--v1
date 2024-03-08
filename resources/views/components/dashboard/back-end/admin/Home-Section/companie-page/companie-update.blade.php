<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Home Page</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Heading *</label>
                                <input type="text" class="form-control" id="HeadingUpdate">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="updatePreview(this)" type="file" class="form-control" id="CompanieImageUpdate">
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update(event)" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
async function updatePreview(input, imageUrl) {
    const oldImg = document.getElementById('oldImg');
    
    if (input.files && input.files[0]) {
        oldImg.src = window.URL.createObjectURL(input.files[0]);
    } else if (imageUrl) {
        oldImg.src = imageUrl;
    } else {
        oldImg.src = "{{ asset('images/default.jpg') }}";
    }
}
async function FillUpUpdateForm(id) {
    try {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/companie-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;
        document.getElementById('HeadingUpdate').value = data.heading;
        // Update the preview with the existing image URL
        updatePreview(document.getElementById('CompanieImageUpdate'), data.img_url);

    } catch (e) {
        unauthorized(e.response.status);
    }
}

async function Update() {
    try {
        let HeadingUpdate = document.getElementById('HeadingUpdate').value;
        let CompanieImageUpdate = document.getElementById('CompanieImageUpdate').files[0];
        let updateID = document.getElementById('updateID').value;

        document.getElementById('update-modal-close').click();

        let formData = new FormData();
        formData.append('heading', HeadingUpdate);
        formData.append('img', CompanieImageUpdate);
        formData.append('id', updateID);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        showLoader();

        let res = await axios.post("/update-companie", formData, config);
        hideLoader();

        if (res.data.status === "success") {
            successToast(res.data.message);
            let modal = new bootstrap.Modal(document.getElementById('update-modal'));
            modal.hide();
            await getList();
        } else {
            errorToast(res.data.message);
        }

    } catch (e) {
        unauthorized(e.response.status);
    }
}
</script>
