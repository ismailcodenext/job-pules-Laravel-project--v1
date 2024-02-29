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
                                <div class="col-12 p-1">
                                    <label class="form-label">Job Title *</label>
                                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Job Description *</label>
                                    <textarea class="form-control" id="jobDescription" name="jobDescription" required></textarea>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Benefits</label>
                                    <textarea class="form-control" id="benefits" name="benefits"></textarea>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Location *</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Deadline *</label>
                                    <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Job Type *</label>
                                    <input type="text" class="form-control" id="jobType" name="location" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Skills *</label>
                                    <input type="text" class="form-control" id="jobSkills" name="jobSkills" required>
                                    <small class="form-text text-muted">Separate skills with commas (e.g., HTML, CSS, JavaScript)</small>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="salary" name="salary">
                                </div>
                                <label class="form-label">Job Category *</label>
                                <select class="form-control" id="jobCategory" name="jobCategory" required>
                                    <option value="category1">Developers</option>
                                    <option value="category2">Designers</option>
                                    <option value="category2">Marketers</option>
                                    <option value="category2">UI/UX</option>
                                    <option value="category2">Others</option>
                                    <!-- Add more categories if needed -->
                                </select>
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


    // FillSectionNameDropDown();
    // async function FillSectionNameDropDown(){
    //     let res = await axios.get("/list-job-company",HeaderToken())
    //     res.data['jobData'].forEach(function (item,i) {
    //         let option=`<option>${item['status']}</option>`
    //         $("#statusView").append(option);
    //     })
    // }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            let res = await axios.post("/job-company-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            console.log('Received response:', res);

            let data = res.data.rows;

            if (data) {
                document.getElementById('jobTitle').value = data.job_title;
                document.getElementById('jobDescription').value = data.job_description;
                document.getElementById('benefits').value = data.benefits;
                document.getElementById('location').value = data.location;
                document.getElementById('deadline').value = data.deadline;
                document.getElementById('jobType').value = data.job_type;
                document.getElementById('jobSkills').value = data.job_skills;
                document.getElementById('salary').value = data.salary;
                document.getElementById('jobCategory').value = data.job_category;
                document.getElementById('statusView').value = data.status;
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

            let res = await axios.post("/update-job-company", formData, config);
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
