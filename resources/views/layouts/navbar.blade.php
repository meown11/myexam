<!-- resources/views/layouts/navbar.blade.php -->
<!-- Header with centered text -->
<h1 class="text-center text-gray display-1 fw-bold mb-0 p-3" style="background-color: #d9d9d9;">JUAN'S AUTO PAINT</h1>

<nav class="navbar navbar-expand-lg bg-danger">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link paint-job" href="/">New Paint Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">Paint Job</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        font-weight: bold;
        color: white;
    }

    .navbar-nav .nav-link:hover {
        text-decoration: none;
    }

    .active {
        color: black !important;
        text-decoration: underline;
    }

    /* Additional styles for the header text */
    .display-1 {
        font-size: 3rem; /* Adjust the font size as needed */
    }

    /* Set text color to gray */
    .text-gray {
        color: #808080;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                navLinks.forEach(function(el) {
                    el.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>
