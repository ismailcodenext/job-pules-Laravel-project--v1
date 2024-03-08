<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Hero Page</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <img class="w-15" id="banner" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Banner</label>
                                <input oninput="banner.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="HeroBanner">
                                <br>
                                <img class="w-15" id="logo" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Logo</label>
                                <input oninput="logo.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="HeroLogo">

                                <label class="form-label">Text *</label>
                                <input type="text" class="form-control" id="HeroTitle">
                               
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
            let BannerInput = document.getElementById('HeroBanner');
            let IogoInput = document.getElementById('HeroLogo');
            let HeroTitle = document.getElementById('HeroTitle').value;

            if (!BannerInput.files || BannerInput.files.length === 0) {
                errorToast(" Photo Required !");
                return;
            }else if(!IogoInput.files || IogoInput.files.length === 0){

            }

            let bannerFile = BannerInput.files[0];
            let logoFile = IogoInput.files[0];

            if (HeroTitle.length === 0) {
                errorToast("Hero Title Required !");
            } else {
                document.getElementById('modal-close').click();
                let formData = new FormData();
                formData.append('img', bannerFile);
                formData.append('logoimg', logoFile);
                formData.append('title', HeroTitle);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                showLoader();
                let res = await axios.post("/create-home", formData, config);
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
