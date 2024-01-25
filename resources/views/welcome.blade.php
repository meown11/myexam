@extends('layouts.app')
 
@section('body')
<center><h1 class="mb-0">New Paint Jobs</h1></center>
<center><img id="carImage1" src="images/defaultcar.jpg" alt=""><img id="carImage" src="images/arrow.jpg" alt=""><img id="carImage2" src="images/defaultcar.jpg" alt=""></center>
    <h1 class="mb-0">Car Details</h1>
    
    <style>
        /* Add this CSS directly in your Blade template */
        .narrow-input {
            width: 200px; /* Adjust the width as needed */
        }

        /* Style for navbar links */
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

        /* Style for form labels */
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px; /* Adjust spacing as needed */
        }

        .form-label {
            width: 100px; /* Adjust the width as needed */
            margin-right: 10px; /* Adjust spacing as needed */
        }
    </style>
    <form id="productForm" action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="platenumber" class="form-label">Plate No.</label>
            <input type="text" name="platenumber" class="form-control narrow-input" id="platenumber">
        </div>
        <div class="form-group">
            <label for="currentcolor" class="form-label">Current Color</label>
            <select name="currentcolor" class="form-control narrow-input" id="currentcolor">
                <option value="" disabled selected hidden>Select Current Color</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
            </select>
        </div>
        <div class="form-group">
            <label for="targetcolor" class="form-label">Target Color</label>
            <select name="targetcolor" class="form-control narrow-input" id="targetcolor">
                <option value="" disabled selected hidden>Select Target Color</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
            </select>
        </div>
        <!-- Hidden input field for status -->
        <input type="hidden" name="status" value="">
        <div>
            <!-- Inline styling for submit button -->
            <button type="submit" class="btn btn-primary" style="background-color: #dc3545; color: white; border-color: #dc3545; width: 150px;">Submit</button>
        </div>
    </form>

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

            // Add event listener for form submission
            document.getElementById('productForm').addEventListener('submit', function() {
                // Set the value of the status input field to "in progress"
                document.querySelector('input[name="status"]').value = "in progress";
            });

            // Add event listener for current color dropdown change
            document.getElementById('currentcolor').addEventListener('change', function() {
                const carImage1 = document.getElementById('carImage1');
                const currentColor = this.value;
                if (currentColor === 'red') {
                    carImage1.src = 'images/currentredcar.jpg';
                } else if (currentColor === 'blue') {
                    carImage1.src = 'images/currentbluecar.jpg';
                } else if (currentColor === 'green') {
                    carImage1.src = 'images/currentgreencar.jpg';
                }
            });

            // Add event listener for target color dropdown change
            document.getElementById('targetcolor').addEventListener('change', function() {
                const carImage2 = document.getElementById('carImage2');
                const targetColor = this.value;
                if (targetColor === 'red') {
                    carImage2.src = 'images/currentredcar.jpg';
                } else if (targetColor === 'blue') {
                    carImage2.src = 'images/currentbluecar.jpg';
                } else if (targetColor === 'green') {
                    carImage2.src = 'images/currentgreencar.jpg';
                }
            });
        });
    </script>
@endsection
