    <!-- Hero Start -->
    <section id="job_hero">
        <div class="container">
            <div class="job_hero_heading">
                <img src="{{ asset('front-end/assets/image/companie_logo/compaine-logo-02.webp') }}" alt="">
                <p>Job Pulse is a cutting-edge job service company dedicated to revolutionizing the way individuals find
                    employment and businesses hire talent.</p>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Job Content Start -->
    <section id="recent_job">
        <div class="container">
            <div class="recent_job_heading mt-5">
                <h1>All Published Jobs</h1>
            </div>
            <!-- Galler Institute  Start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- product menu tab  -->
                    <div class="product_menu_tabs">
                        <ul class="product_menu_item_tab">
                            <li class="product_menu_tab_btn active">Developers (12)
                            </li>
                            <li class="product_menu_tab_btn">Designers (16)
                            </li>
                            <li class="product_menu_tab_btn">Marketers (6)
                            </li>
                            <li class="product_menu_tab_btn">UI/UX (7)
                            </li>
                            <li class="product_menu_tab_btn">Others (14)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- product menu tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_menu_content">
                        <div class="job_wapper">
                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4 p-3">
                                    <div class="job_search">
                                        <form action="">
                                            <input type="search" placeholder="Searh Here">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="product_menu_tab_content active"  id="JobList">
                               
                                {{-- <div class="recent_job_content mt-5">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_text">
                                                <a>Digital Marketer
                                                </a>
                                                <a href="#">On-Site</a>
                                                <a href="#">Meta
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">$2000

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_texts">

                                                <a href="#">php</a>
                                                <a href="#">laravel</a>
                                                <a href="#">Vue JS
                                                </a>
                                                <a href="#">mysql
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">Apply
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent_job_content mt-5">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_text">
                                                <a>Laravel Developer
                                                </a>
                                                <a href="#">On-Site</a>
                                                <a href="#">Meta
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">$2000

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_texts">

                                                <a href="#">php</a>
                                                <a href="#">laravel</a>
                                                <a href="#">Vue JS
                                                </a>
                                                <a href="#">mysql
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">Apply
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent_job_content mt-5">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_text">
                                                <a>Laravel Developer
                                                </a>
                                                <a href="#">On-Site</a>
                                                <a href="#">Meta
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">$2000

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-9">
                                            <div class="recent_job_content_texts">

                                                <a href="#">php</a>
                                                <a href="#">laravel</a>
                                                <a href="#">Vue JS
                                                </a>
                                                <a href="#">mysql
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="recent_job_content_btn">
                                                <a href="#">Apply
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="product_menu_tab_content">
                                <div class="row">
                                    <div class="recent_job_content">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_text">
                                                    <a>FullStack Developer</a>
                                                    <a href="#">Remote</a>
                                                    <a href="#">X</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">$1000
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_texts">
                                                    <a href="#">php</a>
                                                    <a href="#">laravel</a>
                                                    <a href="#">Vue JS
                                                    </a>
                                                    <a href="#">mysql
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">Apply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_job_content mt-5">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_text">
                                                    <a>FullStack Developer</a>
                                                    <a href="#">Remote</a>
                                                    <a href="#">X</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">$1000
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_texts">
                                                    <a href="#">php</a>
                                                    <a href="#">laravel</a>
                                                    <a href="#">Vue JS
                                                    </a>
                                                    <a href="#">mysql
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">Apply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_menu_tab_content">
                                <div class="row">
                                    <div class="recent_job_content">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_text">
                                                    <a>FullStack Developer</a>
                                                    <a href="#">Remote</a>
                                                    <a href="#">X</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">$1000
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_texts">
                                                    <a href="#">php</a>
                                                    <a href="#">laravel</a>
                                                    <a href="#">Vue JS
                                                    </a>
                                                    <a href="#">mysql
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">Apply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_menu_tab_content">
                                <div class="row">
                                    <div class="recent_job_content">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_text">
                                                    <a>FullStack Developer</a>
                                                    <a href="#">Remote</a>
                                                    <a href="#">X</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">$1000
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_texts">
                                                    <a href="#">php</a>
                                                    <a href="#">laravel</a>
                                                    <a href="#">Vue JS
                                                    </a>
                                                    <a href="#">mysql
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">Apply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_menu_tab_content">
                                <div class="row">
                                    <div class="recent_job_content">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_text">
                                                    <a>FullStack Developer</a>
                                                    <a href="#">Remote</a>
                                                    <a href="#">X</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">$1000
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-9">
                                                <div class="recent_job_content_texts">
                                                    <a href="#">php</a>
                                                    <a href="#">laravel</a>
                                                    <a href="#">Vue JS
                                                    </a>
                                                    <a href="#">mysql
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="recent_job_content_btn">
                                                    <a href="#">Apply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row pt-4">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 mt-4">
                                    <div class="notice_pagenation">
                                        <a href="#">&laquo;</a>
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#">&raquo;</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Content End -->

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
                        let EachItem = `<div class="recent_job_content mt-3">
    <div class="row">
        <div class="col-md-9">
            <div class="recent_job_content_text">
                <a>${item['job_title']}</a>
                <a href="#">${item['job_type']}</a>
                <a href="#">X</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="recent_job_content_btn">
                <a href="#">${item['salary']}
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-9">
            <div class="recent_job_content_texts">
                <a href="#">php</a>
                <a href="#">laravel</a>
                <a href="#">Vue JS
                </a>
                <a href="#">mysql
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="recent_job_content_btn">
                <a href="#">Apply
                </a>
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
