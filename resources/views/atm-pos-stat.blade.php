<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .card-title {
            color: #252d60;
        }
        .img {
            width: 50px;
        }
        .img-sub{
            width: 60px;
        }
        .stat-card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <!-- Single Stat Card Container -->
    <div class="stat-card flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md">
        <!-- Grid Layout for Two Columns Inside the Stat Card -->
        <div class="grid grid-cols-2 gap-4 w-full">
            <!-- Column 1: Branches -->
            <div class="flex flex-col items-center justify-center">
                <!-- Row 1: Image -->
                <div class="flex items-center justify-center mb-4">
                    <img src="{{ asset($atm_img) }}" alt="ATM Machines" class="img">
                </div>
                <!-- Row 2: Title -->
                <div class="mb-2">
                    <h1 class="text-lg font-normal card-title text-center">ATM Machines</h1>
                </div>
                <!-- Row 3: Data -->
                <div>
                    <span class="text-xl font-semibold text-gray-800 text-center">{{ $atm }}</span>
                </div>
            </div>

            <!-- Column 2: Extensions -->
            <div class="flex flex-col items-center justify-center">
                <!-- Row 1: Image -->
                <div class="flex items-center justify-center mb-4">
                    <img src="{{ asset($pos_img) }}" alt="POS" class="img">
                </div>
                <!-- Row 2: Title -->
                <div class="mb-2">
                    <h1 class="text-lg font-normal card-title text-center">POS Machines</h1>
                </div>
                <!-- Row 3: Data -->
                <div>
                    <span class="text-xl font-semibold text-gray-800 text-center">{{ $pos }}</span>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
