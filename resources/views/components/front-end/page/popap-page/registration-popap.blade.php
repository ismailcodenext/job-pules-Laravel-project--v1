<div class="card">
    <div class="popap-page">
        <a href="{{url('/companyRegistration')}}">Sing Up Company</a>
        <a href="{{url('/candidate-login')}}">Sing Up Candidate</a>
    </div>
</div>
<style>
    .card {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 300px; /* Adjust the width as needed */
        margin: auto; /* Center the card */
        margin-top: 20px; /* Add some top margin */
    }

    .popap-page {
        text-align: center;
    }

    .popap-page a {
        display: block;
        margin: 10px 0;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .popap-page a:hover {
        background-color: #0056b3;
    }
</style>
