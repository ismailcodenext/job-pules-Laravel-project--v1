<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Company Heading Page</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Heading *</label>
                                <input type="text" class="form-control" id="headingUpdate">
    
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
async function FillUpUpdateForm(id) {
    try {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/companie-heading-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;
        document.getElementById('headingUpdate').value = data.heading;

    } catch (e) {
        unauthorized(e.response && e.response.status);
    }
}

async function update() {
    try {
        let headingUpdate = document.getElementById('headingUpdate').value;
        let updateID = document.getElementById('updateID').value;

        document.getElementById('update-modal-close').click();

        let formData = new FormData();
        formData.append('heading', headingUpdate);
        formData.append('id', updateID);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        showLoader();

        let res = await axios.post("/update-heading-companie", formData, config);
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
        console.error("Error updating company:", e);
        unauthorized(e.response && e.response.status);
    }
}
</script>
