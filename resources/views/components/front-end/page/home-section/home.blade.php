<!-- Hero Start -->
<section id="hero">
    <div class="container">
        <div class="hero_heading">
            <img src="{{ asset('front-end/assets/image/companie_logo/compaine-logo-02.webp') }}" alt="">
            <p>Job Pulse transforms job hunting and hiring by utilizing cutting-edge technology. Our platform
                seamlessly connects skilled individuals with ideal opportunities while helping businesses efficiently
                identify and recruit top talent.</p>
        </div>
    </div>
</section>
<!-- Hero End -->

<!-- Companies Start -->
<section id="companie">
    <div class="container">
        <div class="compainie_heading">
            <h1>Top Companies</h1>
        </div>
        <div class="compaine_content">
            <div class="compaine_cards">
                <div class="compaine_card">
                    <a href="#"><img
                            src="{{ asset('front-end/assets/image/companie_logo/compaine_logo_01.png') }}"
                            alt=""></a>
                </div>
                <div class="compaine_card">
                    <a href="#"><img
                            src="{{ asset('front-end/assets/image/companie_logo/compaine_logo_02.png') }}"
                            alt=""></a>
                </div>
                <div class="compaine_card">
                    <a href="#"><img
                            src="{{ asset('front-end/assets/image/companie_logo/compaine_logo_03.png') }}"
                            alt=""></a>
                </div>
                <div class="compaine_card">
                    <a href="#"><img
                            src="{{ asset('front-end/assets/image/companie_logo/compaine_logo_04.png') }}"
                            alt=""></a>
                </div>
                <div class="compaine_card">
                    <a href="#"><img
                            src="{{ asset('front-end/assets/image/companie_logo/compaine_logo_05.png') }}"
                            alt=""></a>
                </div>
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
                                                    <a href="#">php</a>
                                                    <a href="#">laravel</a>
                                                    <a href="#">Vue JS</a>
                                                    <a href="#">mysql</a>
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

