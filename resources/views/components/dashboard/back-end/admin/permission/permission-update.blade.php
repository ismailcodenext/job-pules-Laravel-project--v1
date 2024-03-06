<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Permission</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Permission Name*</label>
                                <input type="text" class="form-control" id="permissionNameUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Group Name *</label>
                                <select class="form-control" id="permissionGroupUpdate" name="permissionGroupUpdate" required>
                                    <option value="Dashboard">Dashboard</option>
                                    <option value="Employer">Employer</option>
                                    <option value="Candidate">Candidate</option>
                                    <option value="Jobs">Jobs</option>
                                    <!-- Add more job types if needed -->
                                </select>
                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>


<script>

    // async function FillUpUpdateForm(id) {
    //     try {
    //         document.getElementById('updateID').value = id;
    //         showLoader();
    //         let res = await axios.post("/branding-by-id", { id: id.toString() }, HeaderToken());
    //         hideLoader();
    //
    //         let data = res.data.rows;
    //         document.getElementById('NameBN_Update').value = data.nameBangla;
    //         document.getElementById('NameEN_Update').value = data.nameEnglish;
    //         document.getElementById('Address_Update').value = data.address;
    //         document.getElementById('EIINCode_Update').value = data.eiin;
    //         document.getElementById('SchoolCode_Update').value = data.code;
    //
    //         // Update the preview with the existing image URL
    //         updatePreview(document.getElementById('BrandingLogo_Update'), data.logo);
    //     } catch (e) {
    //         unauthorized(e.response.status);
    //     }
    // }


    async function FillUpUpdateForm(id){
        try {
            document.getElementById('updateID').value=id;
            showLoader();
            let res = await axios.post("/permission-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();
            document.getElementById('permissionNameUpdate').value=res.data['rows']['name'];
            document.getElementById('permissionGroupUpdate').value=res.data['rows']['group_name'];
        }catch (e) {
            unauthorized(e.response.status)
        }
    }


    async function Update() {

        try {

            let permissionNameUpdate = document.getElementById('permissionNameUpdate').value;
            let permissionGroupUpdate = document.getElementById('permissionGroupUpdate').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post("/update-permission",{name:permissionNameUpdate,group_name:permissionGroupUpdate,id:updateID},HeaderToken())
            hideLoader();

            if(res.data['status']==="success"){
                document.getElementById("update-form").reset();
                successToast(res.data['message'])
                await getList();
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }
    }



</script>
