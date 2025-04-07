<style>
    .tab{
        font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-weight: 600;
        color: gray;
    }

    .tab:hover {
        background: #10b0d8;
        background: linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        background: -webkit-linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        background: -moz-linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        color: white;
        cursor: pointer;
        /* Color when hovered */
    }

    .tab:active {
        background: #10b0d8;
        background: linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        background: -webkit-linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        background: -moz-linear-gradient(327deg, #10b0d8 50%, #2fb187 80%);
        color: white;
        /* Color when clicked */
    }

    @media (min-width: 576px) {
    .tabs .tab {
        font-size: 14px; /* Adjust the font size for smaller screens */
    }
    .navbar-expand-sm1 .navbar-nav1 .tab {
    margin-right: 1rem; /* Adjust the padding as needed */
  }
}

</style>

<div class="tabs bg-white navbar-expand-sm">
    <ul class="navbar-nav ms-auto">
        <li class="tab tab-lg "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#regisForm" onclick="showTab('regisForm')">Form Pendaftaran</a></a></li>
        <li class="tab tab-lg "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#regisInform" onclick="showTab('regisInform')">Informasi Pendaftaran</a></li>
        <li class="tab tab-lg "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#syaratRegis" onclick="showTab('syaratRegis')">Syarat Pendaftaran</a></li>
        <li class="tab tab-lg "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#biaya" onclick="showTab('biaya')">Biaya</a></li>
        <li class="tab tab-lg"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#kontak" onclick="showTab('kontak')">Kontak</a></li>
    </ul>
</div>
<!-- Add this script section to your Blade view -->
<script>
    function showTab(tabId) {
        var tabs = document.getElementsByClassName('tab-content');
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove('active-tab');
        }
        document.getElementById(tabId).classList.add('active-tab');
    }
</script>
