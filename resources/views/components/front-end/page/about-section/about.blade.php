
    <!-- Hero Start -->
    <section id="hero">
        <div class="hero_image">
          <img src="" id="HomePageBanner" alt="" />
        </div>
        <div class="hero_heading">
          <img src="" id="Logo" alt="" />
          <p id="Description"></p>
        </div>
      </section>
      <!-- Hero End -->

<!-- History Start -->
<section id="history">
    <div class="container" id="CompanieHistory">
      
    </div>
</section>
<!-- History End -->


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

<script>
HomeData();
CompanieHistory();

async function HomeData() {
        try {
            const response = await axios.get("/aboutpage-Data");
            const data = response.data.data;

            document.getElementById('HomePageBanner').src = data.img_url;
            document.getElementById('Logo').src = data.logo;
            document.getElementById('Description').innerHTML = data.title;
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    }


    
async function CompanieHistory() {
    try {
        let res = await axios.get("/company-history-data");
        $("#CompanieHistory").empty();

        if (res.data['Companie_data'].length === 0) {
            // Handle case where no data is returned
            console.warn("No Companie data found");
            return;
        }
        res.data['Companie_data'].forEach((item, i) => {
            let EachItem = `  <div class="history_heading mt-4">
            <h2>${item['heading']}</h2>
        </div>
        <div class="history_content mt-4">
            <p>${item['details']}</p>
        </div>`;
            $("#CompanieHistory").append(EachItem);
        });
    } catch (error) {
        console.error("Error fetching Companie data:", error);
    }
}    


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


</script>