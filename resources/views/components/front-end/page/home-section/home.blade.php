    <!-- Hero Start -->
    <section id="hero">
        <div class="hero_image">
          <img src="{{ asset('front-end/assets/image/banner/home_banner (2).png') }}" alt="" />
        </div>
        <div class="hero_heading">
          <img src="{{asset('front-end/assets/image/nav-logo/Job_Pulse_Logo.webp')}}" alt="" />
          <p>
            Job Pulse is a cutting-edge job service company dedicated to
            revolutionizing the way individuals find employment and businesses
            hire talent.
          </p>
        </div>
      </section>
      <!-- Hero End -->

<!-- Companies Start -->
<section id="companie">
    <div class="container">
        <div class="compainie_heading">
            <h1 id="CompanieHeading"></h1>
        </div>
        <div class="compaine_content">
            <div class="compaine_cards" id="CompanyImg">

            </div>
        </div>
    </div>
</section>
<!-- Companies End -->

<!-- Recent Job Start -->
<section id="recent_job">
    <div class="container">
        <div class="recent_job_heading mt-5">
            <h1>Recent Published Job</h1>
        </div>
        <!-- Galler Institute  Start -->
        <div class="row">
            <div class="col-sm-12">
                <!-- product menu tab  -->
                <div class="product_menu_tabs">
                    <ul class="product_menu_item_tab">
                        <li class="product_menu_tab_btn active">Developers (12)</li>
                        <li class="product_menu_tab_btn">Designers (16)</li>
                        <li class="product_menu_tab_btn">Marketers (6)</li>
                        <li class="product_menu_tab_btn">UI/UX (7)</li>
                        <li class="product_menu_tab_btn">Others (14)</li>
                    </ul>
                </div>
            </div>

            <div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        {{-- <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Companie History Page</h5>
                        </div> --}}
                        <div class="modal-body">
                            <form id="update-form">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 p-1">
                                            <section id="text">
                                                <div class="container">
                                                    <div class="text_wrapper">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="text_heading">
                                                                    <h1>JoB <span style="color: #ff7000">Details</span></h1>
                                                                </div>
                                                                <div class="text_heading_text mt-4">
                                                                    <!-- Update the IDs and use appropriate HTML elements -->
                                                                    <h2 id="jobTitleUpdate"></h2>
                                                                    <p id="jobDescriptionUpdate"></p>
                                                                    <p id="benefitsUpdate"></p>
                                                                    <p id="locationUpdate"></p>
                                                                    <p id="deadlineUpdate"></p>
                                                                    <p id="jobTypeUpdate"></p>
                                                                    <p id="jobSkillUpdate"></p>
                                                                    <p id="salaryUpdate"></p>
                                                                    <p id="jobCategoryUpdate"></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="text_heading_text_btn">
                                                                    <a href="#">Apply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>    
                                            <input class="d-none" id="updateID">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            


        </div>
        <!-- product menu tab content -->
        <div class="row" id="JobList">
            <!-- Job data will be dynamically added here using JavaScript -->
        </div>
        <!-- Galler Institute  End -->
    </div>
</section>
<!-- Recent Job End -->

<script>
CompanieHeadings();
CompanieName();



async function CompanieHeadings() {
            try {
                let res = await axios.get("/company-heading-Data");
                const data = res.data.data;
                document.getElementById('CompanieHeading').innerHTML = data.heading;
            } catch (error) {
                console.error("Error fetching Companie Heading data:", error);
            }
        }

        async function FillUpUpdteForm(id) {
    try {a
        // Fetch job details
        const response = await axios.post("/job-by-id", { id: id.toString() }, HeaderToken());

        // Check if the user is authenticated
        if (response.data.status === 'unauthenticated') {
            // Redirect to the login page
            window.location.href = '/login';
            return;
        }

        const data = response.data.rows;

        // Populate form inputs with job details
        document.getElementById('jobTitleUpdate').innerText = data.job_title;
        document.getElementById('jobDescriptionUpdate').innerText = data.job_description;
        document.getElementById('benefitsUpdate').innerText = data.benefits;
        document.getElementById('locationUpdate').innerText = data.location;
        document.getElementById('deadlineUpdate').innerText = data.deadline;
        document.getElementById('jobTypeUpdate').innerText = data.job_type;
        document.getElementById('jobSkillUpdate').textContent = data.job_skills.split(', ').join(' ');
        document.getElementById('salaryUpdate').innerText = data.salary;
        document.getElementById('jobCategoryUpdate').innerText = data.job_category;
        
    } catch (error) {
        // Handle unauthorized access or errors
        unauthorized(error.response.status);
    }
}



async function CompanieName() {
    try {
        let res = await axios.get("/top-company-data");
        $("#CompanyImg").empty();

        if (res.data['Companie_data'].length === 0) {
            // Handle case where no data is returned
            console.warn("No Companie data found");
            return;
        }
        res.data['Companie_data'].forEach((item, i) => {
            let EachItem = `<div class="compaine_card">
                    <a href="#"><img src="${item['img_url']}" alt=""></a>
                </div>`;
            $("#CompanyImg").append(EachItem);
        });
    } catch (error) {
        console.error("Error fetching Companie data:", error);
    }
}    


Joblist();

async function Joblist() {
    try {
        let res = await axios.get("/list-job-data");
        $("#JobList").empty();

        if (res.data['status'] === 'success') {
            const jobListData = res.data['jobListData'];

            if (jobListData.length === 0) {
                // Handle case where no data is returned
                console.warn("No job data found");
                return;
            }

            jobListData.forEach((item, i) => {
                let EachItem = `<div class="col-lg-12">
                    <div class="product_menu_content">
                        <div class="job_wapper">
                            <div class="product_menu_tab_content active">
                                <div class="recent_job_content">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_text">
                                                <a>${item['job_title']}</a>
                                                <a href="#">${item['job_type']}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">${item['salary']}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_texts">
                                                ${item['job_skills']}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Job Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                $("#JobList").append(EachItem);
            });

            // Set up event listeners after appending the items
            setupEditButtons();
        } else {
            // Handle case where the server returns a fail status
            console.error("Failed to fetch job data:", res.data['message']);
        }
    } catch (error) {
        console.error("Error fetching job data:", error);
    }
}

function setupEditButtons() {
    // Set up event listeners for edit buttons
    $('.editBtn').on('click', async function () {
        let id = $(this).data('id');
        await FillUpUpdateForm(id);
        $("#update-modal").modal('show');
    });
}

</script>




{{-- <script>
    CompanieHeadings();
    CompanieName();
    Joblist();

    async function CompanieHeadings() {
        try {
            let res = await axios.get("/company-heading-Data");
            const data = res.data.data;
            document.getElementById('CompanieHeading').innerHTML = data.heading;
        } catch (error) {
            console.error("Error fetching Companie Heading data:", error);
        }
    }

    async function CompanieName() {
        try {
            let res = await axios.get("/top-company-data");
            $("#CompanyImg").empty();

            if (res.data['Companie_data'].length === 0) {
                console.warn("No Companie data found");
                return;
            }

            res.data['Companie_data'].forEach((item, i) => {
                let EachItem = `
                <div class="compaine_card">
                    <a href="#"><img src="${item['img_url']}" alt=""></a>
                </div>`;
                $("#CompanyImg").append(EachItem);
            });
        } catch (error) {
            console.error("Error fetching Companie data:", error);
        }
    }

    async function Joblist() {
        try {
            let res = await axios.get("/list-job-data");
            $("#JobList").empty();

            if (res.data['status'] === 'success') {
                const jobListData = res.data['jobListData'];

                if (jobListData.length === 0) {
                    console.warn("No job data found");
                    return;
                }

                jobListData.forEach((item, i) => {
                    let EachItem = `<div class="col-lg-12">
                        <div class="recent_job_content_btn">
                            <a data-id="${item['id']}" class="editBtn" href="#">Job Details</a>
                        </div>
                    </div>`;
                    $("#JobList").append(EachItem);
                });

                // You can call this outside the loop if needed
                setupEditButtons();
            } else {
                console.error("Failed to fetch job data:", res.data['message']);
            }
        } catch (error) {
            console.error("Error fetching job data:", error);
        }
    }

    function setupEditButtons() {
        $('.editBtn').on('click', async function () {
            let id = $(this).data('id');
            await FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        });
    }

</script> --}}