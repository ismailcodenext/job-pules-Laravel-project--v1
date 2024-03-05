    <div class="container-fluid" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic information</h4>
                        <p class="card-title-desc"></p>
                    </div>
                    <div class="card-body p-4">


                        <div class="row">
                            <div class="col-lg-12">

                                <label for="FullName" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="FullName">                                
                                <label class="form-label">Father's Name:</label>
                                <input type="text" class="form-control" id="FatherName">
                                <label class="form-label">Mother's Name:</label>
                                <input type="text" class="form-control" id="MotherName">
                                <label class="form-label">Date Of Birth:</label>
                                <input type="date" class="form-control" id="DOF">                                                               
                                <label class="form-label">Blood Group:</label>
                                <input type="text" class="form-control" id="BloodGroup">
                                <label class="form-label">Social ID(NID / Any Type of ID):</label>
                                <input type="text" class="form-control" id="NIDNumber">
                                <label class="form-label">Passport No:</label>
                                <input type="text" class="form-control" id="PassportNo">
                                <label class="form-label">Cell No:</label>
                                <input type="text" class="form-control" id="CellNo">
                                <label class="form-label">Emergency Contact No:</label>
                                <input type="text" class="form-control" id="EmergencyContactNo">
                                <label class="form-label">Email:</label>
                                <input type="text" class="form-control" id="Email">
                                <label class="form-label">WhatsApp No:</label>
                                <input type="text" class="form-control" id="WhatsAppNumber">
                                <label class="form-label">Linkedin Link:</label>
                                <input type="text" class="form-control" id="LinkedinLink">
                                <label class="form-label">Facebook Link:</label>
                                <input type="text" class="form-control" id="FacebookLink">
                                <label class="form-label">Github Link:</label>
                                <input type="text" class="form-control" id="GithubLink">
                                <label class="form-label">Behance/Dribble Link:</label>
                                <input type="text" class="form-control" id="BehanceDribbleLink">
                                <label class="form-label">Portfolio Website:</label>
                                <input type="text" class="form-control" id="PortfolioLink">
                            </div>


                        </div>

                    </div>


                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Educational information</h4>
                        <p class="card-title-desc"></p>
                    </div>
                    <div class="card-body p-4">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="row py-3">
                                <div class="col-lg-3">
                                    <div>
                                        <div class="mb-3">
                                            <label for="degreeType" class="form-label">Degree type
                                                {{ $i + 1 }}</label>
                                            <select class="form-select" id="degreeType_{{ $i }}">
                                                <option>SSC</option>
                                                <option>HSC</option>
                                                <option>University</option>

                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">School/University Name</label>
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
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Professional Trainings(if any)</h4>
                        <p class="card-title-desc"></p>
                    </div>
                    <div class="card-body p-4">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="row py-3">
                                <div class="col-lg-3">
                                    <div>
                                        <div class="mb-3">
                                            <label for="degreeType" class="form-label">Training Name
                                                {{ $i + 1 }}</label>
                                            <select class="form-select" id="degreeType_{{ $i }}">
                                                <option value="codenext">codenext</option>
                                                <option value="codenext">codenext</option>
                                                <option value="codenext">codenext</option>

                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Institutaion Name</label>
                                            <input class="form-control" type="text"
                                                placeholder="Institutaion Name"
                                                id="institutaion_{{ $i }}">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <div class="mb-3">
                                            <label for="major" class="form-label">Completion Year</label>
                                            <input class="form-control" type="text"
                                                placeholder="Completion Year" id="year_{{ $i }}">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Experiences (if any)</h4>
                        <p class="card-title-desc"></p>
                    </div>
                    <div class="card-body p-4">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="row py-3">
                                <div class="col-lg-3">
                                    <div>
                                        <div class="mb-3">
                                            <label for="degreeType" class="form-label">Designation
                                                {{ $i + 1 }}</label>
                                            <select class="form-select" id="designation_{{ $i }}">
                                                <option value="codenext">codenext</option>
                                                <option value="codenext">codenext</option>
                                                <option value="codenext">codenext</option>

                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <div class="mb-3">
                                            <label for="school" class="form-label">Institutaion Name</label>
                                            <input class="form-control" type="text"
                                                placeholder="Institutaion Name"
                                                id="institutaion_{{ $i }}">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <div class="mb-3">
                                            <label for="major" class="form-label">Company Name</label>
                                            <input class="form-control" type="text"
                                                placeholder="Completion Year" id="conpanya_{{ $i }}">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <div class="mb-3">
                                            <label for="major" class="form-label">Joining Date</label>
                                            <input class="form-control" type="date"
                                                placeholder="Joining Dater" id="joining_{{ $i }}">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <div class="mb-3">
                                            <label for="major" class="form-label">Departure Date</label>
                                            <input class="form-control" type="text"
                                                placeholder="Departure Date" id="departure_{{ $i }}">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div class="col-12 p-1">
                            <label class="form-label">Skills (add skills by comma)</label>
                            <textarea class="form-control" placeholder="php,javascript,laravel" id="summernote" cols="30" rows="20"></textarea>
                            <small class="form-text text-muted">Separate skills with commas (e.g., HTML, CSS, JavaScript)</small>
                         </div>
                    </div>

                    <div>
                        <button onclick="profileSubmit()" type="button" id="submit"
                            class="text-center btn btn-primary">Save
                            Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function profileSubmit() {
            var formData = {
                FullName: document.getElementById('FullName').value,
                FatherName: document.getElementById('FatherName').value,
                MotherName: document.getElementById('MotherName').value,
                DOF: document.getElementById('DOF').value,
                BloodGroup: document.getElementById('BloodGroup').value,
                NIDNumber: document.getElementById('NIDNumber').value,
                PassportNo: document.getElementById('PassportNo').value,
                CellNo: document.getElementById('CellNo').value,
                EmergencyContactNo: document.getElementById('EmergencyContactNo').value,
                Email: document.getElementById('Email').value,
                WhatsAppNumber: document.getElementById('WhatsAppNumber').value,
                LinkedinLink: document.getElementById('LinkedinLink').value,
                FacebookLink: document.getElementById('FacebookLink').value,
                GithubLink: document.getElementById('GithubLink').value,
                BehanceDribbleLink: document.getElementById('BehanceDribbleLink').value,
                PortfolioLink: document.getElementById('PortfolioLink').value,
                // Add other form fields as needed
                educationalData: [],
                trainingData: [],
                jobExperienceData: [],
                skills: document.getElementById('summernote').value
            };
    
            // Educational information
            for (var i = 0; i < 3; i++) {
                var degreeType = document.getElementById('degreeType_' + i).value;
                var schoolName = document.getElementById('school_' + i).value;
                var major = document.getElementById('major_' + i).value;
                var passYear = document.getElementById('passYear_' + i).value;
                var gpa = document.getElementById('gpa_' + i).value;
    
                formData.educationalData.push({
                    degreeType: degreeType,
                    schoolName: schoolName,
                    major: major,
                    passYear: passYear,
                    gpa: gpa
                });
            }
    
            // Training information
            for (var i = 0; i < 3; i++) {
                var trainingName = document.getElementById('degreeType_' + i).value;
                var institutionName = document.getElementById('institutaion_' + i).value;
                var completionYear = document.getElementById('year_' + i).value;
    
                formData.trainingData.push({
                    trainingName: trainingName,
                    institutionName: institutionName,
                    completionYear: completionYear
                });
            }
    
            // Job Experience information
            for (var i = 0; i < 3; i++) {
                var designation = document.getElementById('designation_' + i).value;
                var institutionName = document.getElementById('institutaion_' + i).value;
                var companyName = document.getElementById('conpanya_' + i).value;
                var joiningDate = document.getElementById('joining_' + i).value;
                var departureDate = document.getElementById('departure_' + i).value;
    
                formData.jobExperienceData.push({
                    designation: designation,
                    institutionName: institutionName,
                    companyName: companyName,
                    joiningDate: joiningDate,
                    departureDate: departureDate
                });
            }
    
            // Send data to Laravel controller using Axios
            axios.post('/create-profile', formData)
                .then(function (response) {
                    console.log('Profile updated successfully:', response.data.message);
                    // Add any success handling code here
                })
                .catch(function (error) {
                    console.error('Error updating profile:', error);
                    // Add any error handling code here
                });
        }
    </script>
    