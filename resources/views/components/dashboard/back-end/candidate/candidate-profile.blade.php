<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Profile</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="FullName" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="FullName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Father's Name:</label>
                                <input type="text" class="form-control" id="FatherName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Mother's Name:</label>
                                <input type="text" class="form-control" id="MotherName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Date Of Birth:</label>
                                <input type="date" class="form-control" id="DOF">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Blood Group:</label>
                                <input type="text" class="form-control" id="BloodGroup">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Social ID(NID / Any Type of ID):</label>
                                <input type="text" class="form-control" id="NIDNumber">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Passport No:</label>
                                <input type="text" class="form-control" id="PassportNo">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Cell No:</label>
                                <input type="text" class="form-control" id="CellNo">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Emergency Contact No:</label>
                                <input type="text" class="form-control" id="EmergencyContactNo">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Email:</label>
                                <input type="text" class="form-control" id="Email">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">WhatsApp No:</label>
                                <input type="text" class="form-control" id="WhatsAppNumber">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Linkedin Link:</label>
                                <input type="text" class="form-control" id="LinkedinLink">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Facebook Link:</label>
                                <input type="text" class="form-control" id="FacebookLink">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Github Link:</label>
                                <input type="text" class="form-control" id="GithubLink">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Behance/Dribble Link:</label>
                                <input type="text" class="form-control" id="BehanceDribbleLink">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Portfolio Website:</label>
                                <input type="text" class="form-control" id="PortfolioLink">
                            </div>
                            <h4 class="card-title">Educational information</h4>
                            @for ($i = 0; $i < 3; $i++)
                                <div class="row py-3">
                                    <div class="col-lg-3">
                                        <div>
                                            <div class="mb-3">
                                                <label for="degreeType" class="form-label">Degree type
                                                    {{ $i + 1 }}</label>
                                                <select class="form-select" id="degreeType_{{ $i }}">
                                                    <option value="SSC">SSC</option>
                                                    <option value="HSC">HSC</option>
                                                    <option value="University">University</option>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <div class="mb-3">
                                                <label for="school" class="form-label">School/University
                                                    Name</label>
                                                <input class="form-control" type="text"
                                                    placeholder="EX: North South University"
                                                    id="school_{{ $i }}">
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div>
                                            <div class="mb-3">
                                                <label for="major" class="form-label">Group/Major</label>
                                                <input class="form-control" type="text"
                                                    placeholder="EX: Computer Science" id="major_{{ $i }}">
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div>
                                            <div class="mb-3">
                                                <label for="passYear" class="form-label">Passing Year</label>
                                                <input class="form-control" type="text" placeholder="EX: 2022"
                                                    id="passYear_{{ $i }}">
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div>
                                            <div class="mb-3">
                                                <label for="gpa" class="form-label">GPA/CGPA</label>
                                                <input class="form-control" type="text" placeholder="EX: 5.00"
                                                    id="gpa_{{ $i }}">
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            @endfor
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>
            </div>
        </div>
    </div>
</div>
<script>new MultiSelectTag('tags') </script>
<script>
    async function Save() {
        try {
            // Extracting personal information
            let FullName = document.getElementById('FullName').value;
            let FatherName = document.getElementById('FatherName').value;
            let MotherName = document.getElementById('MotherName').value;
            let DOF = document.getElementById('DOF').value;
            let BloodGroup = document.getElementById('BloodGroup').value;
            let NIDNumber = document.getElementById('NIDNumber').value;
            let PassportNo = document.getElementById('PassportNo').value;
            let CellNo = document.getElementById('CellNo').value;
            let EmergencyContactNo = document.getElementById('EmergencyContactNo').value;
            let Email = document.getElementById('Email').value;
            let WhatsAppNumber = document.getElementById('WhatsAppNumber').value;
            let LinkedinLink = document.getElementById('LinkedinLink').value;
            let FacebookLink = document.getElementById('FacebookLink').value;
            let GithubLink = document.getElementById('GithubLink').value;
            let BehanceDribbleLink = document.getElementById('BehanceDribbleLink').value;
            let PortfolioLink = document.getElementById('PortfolioLink').value;

            // Creating FormData
            let formData = new FormData();
            formData.append('full_name', FullName);
            formData.append('father_name', FatherName);
            formData.append('mother_name', MotherName);
            formData.append('dof', DOF);
            formData.append('blood_group', BloodGroup);
            formData.append('nid_number', NIDNumber);
            formData.append('passport_no', PassportNo);
            formData.append('cell_no', CellNo);
            formData.append('emergency_contact_no', EmergencyContactNo);
            formData.append('email', Email);
            formData.append('whatsapp_number', WhatsAppNumber);
            formData.append('linkedin_link', LinkedinLink);
            formData.append('facebook_link', FacebookLink);
            formData.append('github_link', GithubLink);
            formData.append('portfolio_link', BehanceDribbleLink);
            formData.append('portfolio_website', PortfolioLink);


            const educationInfo = [];

            for (let i = 0; i < 3; i++) {
                const degreeType = document.getElementById(`degreeType_${i}`).value;
                const schoolName = document.getElementById(`school_${i}`).value;
                const major = document.getElementById(`major_${i}`).value;
                const passingYear = document.getElementById(`passYear_${i}`).value;
                const gpa = document.getElementById(`gpa_${i}`).value;

                educationInfo.push({
                    degreeType: degreeType,
                    schoolName: schoolName,
                    major: major,
                    passYear: passingYear,
                    gpa: gpa,
                });
            }

            // Setting up the configuration with headers
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            }

            // Making the request
            showLoader();
            let res = await axios.post("/create-profile", formData, config);
            hideLoader();

            // Handling the response
            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast(res.data['message']);
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>







{{-- 
<script>
    async function Save() {
        try {

            let FullName = document.getElementById('FullName').value;
            let FatherName = document.getElementById('FatherName').value;
            let MotherName = document.getElementById('MotherName').value;
            let DOF = document.getElementById('DOF').value;
            let BloodGroup = document.getElementById('BloodGroup').value;
            let NIDNumber = document.getElementById('NIDNumber').value;
            let PassportNo = document.getElementById('PassportNo').value;
            let CellNo = document.getElementById('CellNo').value;
            let EmergencyContactNo = document.getElementById('EmergencyContactNo').value;
            let Email = document.getElementById('Email').value;
            let WhatsAppNumber = document.getElementById('WhatsAppNumber').value;
            let LinkedinLink = document.getElementById('LinkedinLink').value;
            let FacebookLink = document.getElementById('FacebookLink').value;
            let GithubLink = document.getElementById('GithubLink').value;
            let BehanceDribbleLink = document.getElementById('BehanceDribbleLink').value;
            let PortfolioLink = document.getElementById('PortfolioLink').value;


            document.getElementById('modal-close').click();
            let formData = new FormData();
            formData.append('full_name', FullName);
            formData.append('father_name', FatherName);
            formData.append('mother_name', MotherName);
            formData.append('dof', DOF);
            formData.append('blood_group', BloodGroup);
            formData.append('nid_number', NIDNumber);
            formData.append('passport_no', PassportNo);
            formData.append('cell_no', CellNo);
            formData.append('emergency_contact_no', EmergencyContactNo);
            formData.append('email', Email);
            formData.append('whatsapp_number', WhatsAppNumber);
            formData.append('linkedin_link', LinkedinLink);
            formData.append('facebook_link', FacebookLink);
            formData.append('github_link', GithubLink);
            formData.append('portfolio_link', BehanceDribbleLink);
            formData.append('portfolio_website', PortfolioLink);


//             const educationInfo = [];

// let contact= $('#contact').val();
// let address= $('#address').val();
// let link= $('#linkUrl').val();
// let port= $('#portUrl').val();


// for (let i = 0; i < 3; i++) {
//     const degreeType = document.getElementById(`degreeType_${i}`).value;
//     const schoolName = document.getElementById(`school_${i}`).value;
//     const major = document.getElementById(`major_${i}`).value;
//     const passingYear = document.getElementById(`passYear_${i}`).value;
//     const gpa = document.getElementById(`gpa_${i}`).value;

//     educationInfo.push({
//         degreeType: degreeType,
//         schoolName: schoolName,
//         major: major,
//         passYear: passingYear,
//         gpa: gpa,
//     });

let contact = $('#contact').val();
        let address = $('#address').val();
        let link = $('#linkUrl').val();
        let port = $('#portUrl').val();

        let formData = new FormData();
        formData.append('contact', contact);
        formData.append('address', address);
        formData.append('link', link);
        formData.append('port', port);

        // Adding educationInfo data
        const educationInfo = [];

        for (let i = 0; i < 3; i++) {
            const degreeType = document.getElementById(`degreeType_${i}`).value;
            const schoolName = document.getElementById(`school_${i}`).value;
            const major = document.getElementById(`major_${i}`).value;
            const passingYear = document.getElementById(`passYear_${i}`).value;
            const gpa = document.getElementById(`gpa_${i}`).value;

            educationInfo.push({
                degreeType: degreeType,
                schoolName: schoolName,
                major: major,
                passYear: passingYear,
                gpa: gpa,
            });
        }

        formData.append('educationInfo', JSON.stringify(educationInfo));



        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        }

        showLoader();
        let res = await axios.post("/create-profile", formData, config);
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

</script> --}}
