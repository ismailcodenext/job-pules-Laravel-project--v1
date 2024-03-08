<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Companie History Page</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Companie Heading  *</label>
                                <input type="text" class="form-control" id="CompanieHeadingUpdate">
                                
                                <label class="form-label">Companie Details *</label>
                                <textarea class="form-control" id="CompanieDeatilsUpdate" cols="20" rows="10"></textarea>
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
async function FillUpUpdateForm(id) {
    try {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/companie-history-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;

        document.getElementById('CompanieHeadingUpdate').value = data.heading;
        document.getElementById('CompanieDeatilsUpdate').value = data.details;

    } catch (e) {
        unauthorized(e.response.status);
    }
}

async function Update() {
    try {
        let CompanieHeadingUpdate = document.getElementById('CompanieHeadingUpdate').value;
        let CompanieDeatilsUpdate = document.getElementById('CompanieDeatilsUpdate').value;
        let updateID = document.getElementById('updateID').value;

        document.getElementById('update-modal-close').click();

        let formData = new FormData();
        formData.append('heading', CompanieHeadingUpdate);
        formData.append('details', CompanieDeatilsUpdate);
        formData.append('id', updateID);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        showLoader();

        let res = await axios.post("/update-companie-history", formData, config);
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
