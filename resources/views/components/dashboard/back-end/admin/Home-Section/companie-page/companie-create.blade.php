<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Company Image Create</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Companie Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="ComapnieImage">

                               
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
            let imgInput = document.getElementById('ComapnieImage');

            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Companie Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            document.getElementById('modal-close').click();
            let formData = new FormData();
            formData.append('img', imgFile);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            }

            showLoader();
            let res = await axios.post("/create-companie", formData, config);
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


{{-- <script>
    async function Save() {
        try {
            let CompanieHeading = document.getElementById('CompanieHeading');
            let imgInput = document.getElementById('ComapnieImage');

            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Companie Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (CompanieHeading.length === 0) {
                errorToast("Companie Required !");
            } else {
                document.getElementById('modal-close').click();
                let formData = new FormData();
                formData.append('heading', CompanieHeading);
                formData.append('img', imgFile);


                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                showLoader();
                let res = await axios.post("/create-companie", formData, config);
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

</script> --}}
