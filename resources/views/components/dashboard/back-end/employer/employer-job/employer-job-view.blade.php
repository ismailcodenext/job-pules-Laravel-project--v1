<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Companie History Page</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <div class="col-12 p-1">
                                    <label class="form-label">Job Title *</label>
                                    <input type="text" class="form-control" id="jobTitleUpdate" name="jobTitle" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Job Description *</label>
                                    <textarea class="form-control" id="jobDescriptionUpdate" name="jobDescription" required></textarea>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Benefits</label>
                                    <textarea class="form-control" id="benefitsUpdate" name="benefits"></textarea>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Location *</label>
                                    <input type="text" class="form-control" id="locationUpdate" name="location" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Deadline *</label>
                                    <input type="datetime-local" class="form-control" id="deadlineUpdate" name="deadline" required>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Job Type *</label>
                                    <select class="form-control" id="jobTypeUpdate" name="jobType" required>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Remote">Remote</option>
                                        <!-- Add more job types if needed -->
                                    </select>
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">Skills *</label>
                                    <input class="form-control" id="jobSkillUpdate">
                                    <small class="form-text text-muted">Separate skills with commas (e.g., HTML, CSS, JavaScript)</small>
                                 </div>
    
                                <div class="col-12 p-1">
                                    <label class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="salaryUpdate" name="salary">
                                </div>
                                <label class="form-label">Job Category *</label>
                                <select class="form-control" id="jobCategoryUpdate" name="jobCategory" required>
                                   <option value="category1">Developers</option>
                                   <option value="category2">Designers</option>
                                   <option value="category3">Marketers</option>
                                   <option value="category4">UI/UX</option>
                                   <option value="category5">Others</option>
                                   <!-- Add more categories if needed -->
                                </select>    
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update(event)" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
async function FillUpUpdateForm(id) {
    try {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/job-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;

        document.getElementById('jobTitleUpdate').value = data.job_title;
        document.getElementById('jobDescriptionUpdate').value = data.job_description;
        document.getElementById('benefitsUpdate').value = data.benefits;
        document.getElementById('locationUpdate').value = data.location;
        document.getElementById('deadlineUpdate').value = data.deadline;
        document.getElementById('jobTypeUpdate').value = data.job_type;
        document.getElementById('jobSkillUpdate').value = data.job_skills;
        document.getElementById('salaryUpdate').value = data.salary;
        document.getElementById('jobCategoryUpdate').value = data.job_category;
    } catch (e) {
        unauthorized(e.response.status);
    }
}

async function Update() {
    try {
        let jobTitleUpdate = document.getElementById('jobTitleUpdate').value;
        let jobDescriptionUpdate = document.getElementById('jobDescriptionUpdate').value;
        let benefitsUpdate = document.getElementById('benefitsUpdate').value;
        let locationUpdate = document.getElementById('locationUpdate').value;
        let deadlineUpdate = document.getElementById('deadlineUpdate').value;
        let jobTypeUpdate = document.getElementById('jobTypeUpdate').value;
        let jobSkillUpdate = document.getElementById('jobSkillUpdate').value;
        let salaryUpdate = document.getElementById('salaryUpdate').value;
        let jobCategoryUpdate = document.getElementById('jobCategoryUpdate').value;
        let updateID = document.getElementById('updateID').value;

        document.getElementById('update-modal-close').click();

        let formData = new FormData();
        formData.append('job_title', jobTitleUpdate);
        formData.append('job_description', jobDescriptionUpdate);
        formData.append('benefits', benefitsUpdate);
        formData.append('location', locationUpdate);
        formData.append('deadline', deadlineUpdate);
        formData.append('job_type', jobTypeUpdate);
        formData.append('job_skills', jobSkillUpdate);
        formData.append('salary', salaryUpdate);
        formData.append('job_category', jobCategoryUpdate);
        formData.append('id', updateID);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        showLoader();

        let res = await axios.post("/update-job", formData, config);
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
