<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Information</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstNameView">
                                <label class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastNameView">
                                <label class="form-label">Email:</label>
                                <input type="text" class="form-control" id="emailView">
                                <label class="form-label">Mobile:</label>
                                <input type="text" class="form-control" id="mobileView">
                                <label class="form-label">Role:</label>
                                <input type="text" class="form-control" id="roleView">
                                <label class="form-label">Status:</label>
                                <select class="form-select" id="statusView" aria-label="Default select example">
                                    <option value="approved">approved</option>
                                    <option value="pending">pending</option>
                                </select>
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update(event)" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>

<script>


    FillSectionNameDropDown();
    async function FillSectionNameDropDown(){
        let res = await axios.get("/list-employer",HeaderToken())
        res.data['employerData'].forEach(function (item,i) {
            let option=`<option>${item['status']}</option>`
            $("#statusView").append(option);
        })
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            let res = await axios.post("/employer-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            console.log('Received response:', res);

            let data = res.data.rows;

            if (data) {
                document.getElementById('firstNameView').value = data.firstName;
                document.getElementById('lastNameView').value = data.lastName;
                document.getElementById('emailView').value = data.email;
                document.getElementById('mobileView').value = data.mobile;
                document.getElementById('statusView').value = data.status;
                document.getElementById('roleView').value = data.role;
            } else {
                console.error('Error: Invalid response format or missing data.');
                // Handle the error as needed
            }
        } catch (e) {
            console.error('Error in FillUpUpdateForm:', e);
            unauthorized(e.response.status);
        }
    }




    async function Update() {
        try {
            let statusView = document.getElementById('statusView').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('status', statusView);
            formData.append('id', updateID);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();

            let res = await axios.post("/update-employer", formData, config);
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
