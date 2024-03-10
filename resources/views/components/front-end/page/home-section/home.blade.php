<!-- Hero Start -->
<section id="hero">
            <img src="{{ asset('front-end/assets/image/banner/home_banner (2).png') }}" alt="">
            <div class="hero_text">
                <div class="hero_img">
                <img src="{{asset('front-end/assets/image/companie_logo/Group_142.webp')}}" alt="">
                </div>
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
                                                    <a href="#">Apply</a>
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
            } else {
                // Handle case where the server returns a fail status
                console.error("Failed to fetch job data:", res.data['message']);
            }
        } catch (error) {
            console.error("Error fetching job data:", error);
        }
    }
</script>



