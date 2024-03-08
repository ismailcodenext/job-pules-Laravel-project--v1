<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Companie History Page</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Companie Heading *</label>
                                <input type="text" class="form-control" id="CompanieHeading">
                               
                                <label class="form-label">Companie Details *</label>
                                <textarea class="form-control" id="CompanieDeatils" cols="20" rows="10"></textarea>
                               
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>
<script>
    async function Save() {
        try {
            let CompanieHeading = document.getElementById('CompanieHeading').value;
            let CompanieDeatils = document.getElementById('CompanieDeatils').value;

            if (CompanieHeading.length === 0) {
                errorToast("Companie Heading Required !");
            }else if(CompanieDeatils.length === 0){
                errorToast("Companie History Required !");
            }else {
                document.getElementById('modal-close').click();
                let formData = new FormData();
                formData.append('heading', CompanieHeading);
                formData.append('details', CompanieDeatils);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                showLoader();
                let res = await axios.post("/create-companie-history", formData, config);
                hideLoader();

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("save-form").reset();
                    await getList();
                } else {
                    errorToast(res.data['message'])
                }
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }
</script>
