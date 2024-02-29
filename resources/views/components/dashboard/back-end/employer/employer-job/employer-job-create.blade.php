{{--<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-md">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h6 class="modal-title" id="exampleModalLabel">Create Job</h6>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form id="save-form">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Job Title *</label>--}}
{{--                                <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Job Description *</label>--}}
{{--                                <textarea class="form-control" id="jobDescription" name="jobDescription" required></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Benefits</label>--}}
{{--                                <textarea class="form-control" id="benefits" name="benefits"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Location *</label>--}}
{{--                                <input type="text" class="form-control" id="location" name="location" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Deadline *</label>--}}
{{--                                <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Job Type *</label>--}}
{{--                                <select class="form-control" id="jobType" name="jobType" required>--}}
{{--                                    <option value="full_time">Full Time</option>--}}
{{--                                    <option value="part_time">Part Time</option>--}}
{{--                                    <!-- Add more job types if needed -->--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Skills *</label>--}}
{{--                                <input type="text" class="form-control" id="jobSkills" name="jobSkills" required>--}}
{{--                                <small class="form-text text-muted">Separate skills with commas (e.g., HTML, CSS, JavaScript)</small>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 p-1">--}}
{{--                                <label class="form-label">Salary</label>--}}
{{--                                <input type="text" class="form-control" id="salary" name="salary">--}}
{{--                            </div>--}}
{{--                            <input id="status" value="pending" class="form-control" type="hidden"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>--}}
{{--                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<script>--}}
{{--    async function Save() {--}}
{{--        try {--}}
{{--            let jobTitle = document.getElementById('jobTitle').value;--}}
{{--            let jobDescription = document.getElementById('jobDescription').value;--}}
{{--            let benefits = document.getElementById('benefits').value;--}}
{{--            let location = document.getElementById('location').value;--}}
{{--            let deadline = document.getElementById('deadline').value;--}}
{{--            let jobType = document.getElementById('jobType').value;--}}
{{--            let jobSkills = document.getElementById('jobSkills').value.split(',').map(skill => skill.trim()); // Split and trim');--}}
{{--            let salary = document.getElementById('salary').value;--}}
{{--            let status = document.getElementById('status').value;--}}

{{--            if (jobTitle.length === 0 || jobDescription.length === 0 || location.length === 0 || deadline.length === 0 || jobType.length === 0 || jobSkills.length === 0 || status.length === 0) {--}}
{{--                errorToast("Please fill in all required fields.");--}}
{{--            } else {--}}
{{--                document.getElementById('modal-close').click();--}}
{{--                let formData = new FormData();--}}
{{--                formData.append('jobTitle', jobTitle);--}}
{{--                formData.append('jobDescription', jobDescription);--}}
{{--                formData.append('benefits', benefits);--}}
{{--                formData.append('location', location);--}}
{{--                formData.append('deadline', deadline);--}}
{{--                formData.append('jobType', jobType);--}}
{{--                jobSkills.forEach(skill => {--}}
{{--                    formData.append('jobSkills[]', skill);--}}
{{--                });--}}
{{--                formData.append('salary', salary);--}}
{{--                formData.append('status', status);--}}

{{--                const config = {--}}
{{--                    headers: {--}}
{{--                        'content-type': 'multipart/form-data',--}}
{{--                        ...HeaderToken().headers--}}
{{--                    }--}}
{{--                }--}}

{{--                showLoader();--}}
{{--                let res = await axios.post("/create-job", formData, config);--}}
{{--                hideLoader();--}}

{{--                if (res.data['status'] === "success") {--}}
{{--                    successToast(res.data['message']);--}}
{{--                    document.getElementById("save-form").reset();--}}
{{--                    await getList();--}}
{{--                } else {--}}
{{--                    errorToast(res.data['message'])--}}
{{--                }--}}
{{--            }--}}

{{--        } catch (e) {--}}
{{--            unauthorized(e.response.status)--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}

<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Job</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
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
                                <select class="form-control" id="jobType" name="jobType" required>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Remote">Remote</option>
                                    <!-- Add more job types if needed -->
                                </select>
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
                            <input id="status" value="pending" class="form-control" type="hidden"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Save() {
        try {
            let jobTitle = document.getElementById('jobTitle').value;
            let jobDescription = document.getElementById('jobDescription').value;
            let benefits = document.getElementById('benefits').value;
            let location = document.getElementById('location').value;
            let deadline = document.getElementById('deadline').value;
            let jobType = document.getElementById('jobType').value;
            let jobSkills = document.getElementById('jobSkills').value.split(',').map(skill => skill.trim());
            let salary = document.getElementById('salary').value;
            let jobCategory = document.getElementById('jobCategory').value;
            let status = document.getElementById('status').value;

            if (jobTitle.length === 0 || jobDescription.length === 0 || location.length === 0 || deadline.length === 0 || jobType.length === 0 || jobSkills.length === 0 || jobCategory.length === 0 || status.length === 0) {
                errorToast("Please fill in all required fields.");
            } else {
                document.getElementById('modal-close').click();
                let formData = new FormData();
                formData.append('jobTitle', jobTitle);
                formData.append('jobDescription', jobDescription);
                formData.append('benefits', benefits);
                formData.append('location', location);
                formData.append('deadline', deadline);
                formData.append('jobType', jobType);
                jobSkills.forEach(skill => {
                    formData.append('jobSkills[]', skill);
                });
                formData.append('salary', salary);
                formData.append('jobCategory', jobCategory);
                formData.append('status', status);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                showLoader();
                let res = await axios.post("/create-job", formData, config);
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



