<style type="text/css">

    .form-check-label{
        text-transform: capitalize;
    }
</style>
<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">All Role</label>
                                <select class="form-select" id="rolesNameData" aria-label="Default select example">
                                    <option value="">Select Role</option>
                                </select>

                            </div>

                            <div class="form-check mb-2 mt-2 form-check-primary">
                                <input class="form-check-input" type="checkbox" value="" id="customckeck15" >
                                <label class="form-check-label" for="customckeck15">Primary</label>
                            </div>

                            <hr>

                             <div style="display: flex;">
                                 <div id="roleGroup">

                                 </div>

                                 <div id="permissionName" style="margin-left: 80px">

                                 </div>
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

    groupName();
    async function groupName() {
        try {
            let res = await axios.get("/list-role-in-permission");
            $("#roleGroup").empty();

            if (res.data['status'] === 'success') {
                const Permissiondata = res.data['Permissiondata'];

                if (Permissiondata.length === 0) {
                    console.warn("No job data found");
                    return;
                }

                // Set to store unique group names
                let uniqueGroupNames = new Set();

                Permissiondata.forEach((item, i) => {
                    // Check if group name is already displayed, if not, add it to the set
                    if (!uniqueGroupNames.has(item['group_name'])) {
                        let EachItem = `<div class="col-3">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" value="" id="customckeck${i}"  >
                                            <label class="form-check-label" for="customckeck${i}">${item['group_name']}</label>
                                        </div>
                                    </div>`;
                        $("#roleGroup").append(EachItem);
                        // Add the group name to the set
                        uniqueGroupNames.add(item['group_name']);
                    }
                });

                // Set up event listeners after appending the items
                setupEditButtons();
            } else {
                console.error("Failed to fetch job data:", res.data['message']);
            }
        } catch (error) {
            console.error("Error fetching job data:", error);
        }
    }

    permissionName();
    async function permissionName() {
        try {
            let res = await axios.get("/list-role-in-permission");
            $("#permissionName").empty();

            if (res.data['status'] === 'success') {
                const Permissiondata = res.data['Permissiondata'];

                if (Permissiondata.length === 0) {
                    console.warn("No permission data found");
                    return;
                }

                // Group permissions by group_name
                const groupedPermissions = {};
                Permissiondata.forEach((item, i) => {
                    if (!groupedPermissions[item['group_name']]) {
                        groupedPermissions[item['group_name']] = [];
                    }
                    groupedPermissions[item['group_name']].push(item);
                });

                // Render permissions under their respective groups
                for (const groupName in groupedPermissions) {
                    let groupHtml = `<div class="col-12"><strong>${groupName}</strong></div>`;
                    groupedPermissions[groupName].forEach((permission) => {
                        groupHtml += `<div class="col-9">
                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="${permission['id']}" id="customckeck${permission['id']}">
                                        <label class="form-check-label" for="customckeck${permission['id']}">${permission['name']}</label>
                                    </div>
                                </div>`;
                    });
                    $("#permissionName").append(groupHtml);
                }
            } else {
                console.error("Failed to fetch permission data:", res.data['message']);
            }
        } catch (error) {
            console.error("Error fetching permission data:", error);
        }
    }



    $('#customckeck15').click(function(){
        if ($(this).is(':checked')) {
            $('input[type = checkbox]').prop('checked',true);
        }else{
            $('input[type = checkbox]').prop('checked',false);
        }
    });



    FillRoleNameDropDown();
    async function FillRoleNameDropDown(){
        let res = await axios.get("/list-role",HeaderToken())
        res.data['roleData'].forEach(function (item,i) {
            let option=`<option value="${item['id']}">${item['name']}</option>`
            $("#rolesNameData").append(option);
        })
    }

    async function Save() {
        try {
            // Get the selected role name
            let roleId = document.getElementById('rolesNameData').value;
            let roleName = $('#rolesNameData option:selected').text();

            if (roleId.length === 0) {
                errorToast("Role is required!");
            } else {
                document.getElementById('modal-close').click();

                // Collect selected permissions
                let selectedPermissions = [];
                $('input[name="permission[]"]:checked').each(function() {
                    selectedPermissions.push($(this).val());
                });

                // Prepare the data to be sent to the server
                let formData = new FormData();
                formData.append('role_id', roleId);
                selectedPermissions.forEach(permissionId => {
                    formData.append('permission_ids[]', permissionId);
                });
                formData.append('role_name', roleName);

                // Send data to the server
                const config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                };

                showLoader();
                let res = await axios.post("/create-role-in-permission", formData, config);
                console.log('Server Response:', res); // Log the response
                hideLoader();

                if (res && res.data && res.data.status === "success") {
                    successToast(res.data.message);
                    document.getElementById("save-form").reset();
                    await getList();
                } else {
                    errorToast(res && res.data && res.data.message || "An unexpected error occurred while saving.");
                }
            }
        } catch (error) {
            console.error("Error in Save function:", error);
            errorToast("An unexpected error occurred while saving. Please try again.");
        }
    }







</script>
