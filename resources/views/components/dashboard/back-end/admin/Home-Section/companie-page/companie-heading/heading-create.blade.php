<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Companie Heading Page</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Heading *</label>
                                <input type="text" class="form-control" id="CompanieHeading">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function Save() {
        try {
            let CompanieHeading = document.getElementById('CompanieHeading').value;

            document.getElementById('modal-close').click();
            let formData = new FormData();
            formData.append('heading', CompanieHeading);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            }

            showLoader();
            let res = await axios.post("/create-heading-companie", formData, config);
            hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast(res.data['message'])
            }
        } catch (e) {
            unauthorized(e.response.status)
        }
    }
</script>
