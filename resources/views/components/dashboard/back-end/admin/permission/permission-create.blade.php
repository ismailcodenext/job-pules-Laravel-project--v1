<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Group</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Permission Name*</label>
                                <input type="text" class="form-control" id="permissionName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Group Name *</label>
                                <select class="form-control" id="permissionGroup" name="permissionGroup" required>
                                    <option value="Dashboard">Dashboard</option>
                                    <option value="Employer">Employer</option>
                                    <option value="Candidate">Candidate</option>
                                    <option value="Jobs">Jobs</option>
                                    <!-- Add more job types if needed -->
                                </select>
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
            let permissionName = document.getElementById('permissionName').value;
            let permissionGroup = document.getElementById('permissionGroup').value;

            if (permissionName.length === 0 || permissionGroup.length === 0) {
                errorToast("All fields are required!");
            } else {
                document.getElementById('modal-close').click();

                let formData = new FormData();
                formData.append('name', permissionName);
                formData.append('group_name', permissionGroup);
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                }

                showLoader();
                let res = await axios.post("/create-permission", formData, config);
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
