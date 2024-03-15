<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between">
                    <div class="align-items-center col">
                        <h4>Role In Permission List</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-dark"/>
                <table class="table" id="tableData">
                    <thead>
                    <tr class="bg-light">
                        <th>No</th>
                        <th>Role Name</th>
                        <th>Permission Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tableList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Wrap your script in a document.ready function to ensure the DOM is fully loaded before executing the script
    $(document).ready(function () {
        getList();
    });

    async function getList() {
        try {
            showLoader();
            // Use Promise.all to fetch role and permission data concurrently
            let [roleRes, permissionRes] = await Promise.all([
                axios.get("/list-role", HeaderToken()),
                axios.get("/list-permission", HeaderToken())
            ]);
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            roleRes.data['roleData'].forEach(function (role, index) {
                // Find the permission associated with the role (assuming you have a relation)
                let permission = permissionRes.data['permissionData'].find(permission => permission['role_id'] === role['id']);

                let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${role['name']}</td>
                    <td>${permission ? permission['name'] : 'No Permission'}</td>
                    <td>
                        <button data-id="${role['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${role['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`;
                tableList.append(row);
            });

            // Use event delegation to handle click events for dynamically added elements
            tableList.on('click', '.editBtn', async function () {
                let id = $(this).data('id');
                await FillUpUpdateForm(id);
                $("#update-modal").modal('show');
            });

            tableList.on('click', '.deleteBtn', function () {
                let id = $(this).data('id');
                $("#delete-modal").modal('show');
                $("#deleteID").val(id);
            });

            new DataTable('#tableData', {
                order: [[0, 'desc']],
                lengthMenu: [5, 10, 15, 20, 30]
            });
        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>
