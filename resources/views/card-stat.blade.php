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
            width: 40px;
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
    <div class="stat-card p-6 bg-white rounded-lg shadow-md">
        <!-- Grid Layout with 3 Rows and 3 Columns -->
        <div class="grid grid-rows-3 grid-cols-3 gap-1 w-full">
            <!-- Row 1 -->
            <!-- Column 1: Image -->
            <div class="flex items-center justify-center">
                <img src="{{ asset($atm_img) }}" alt="ATM" class="img">
            </div>
            <!-- Column 2: Title -->
            <div class="flex items-center justify-center">
                <h1 class="text-s font-normal card-title text-center">ATM Cards Issued </h1>
            </div>
            <!-- Column 3: Data -->
            <div class="flex items-center justify-center">
                <span class="text-m font-semibold text-gray-800">{{ $atm }}</span>
            </div>

            <!-- Row 2 -->
            <!-- Column 1: Image -->
            <div class="flex items-center justify-center">
                <img src="{{ asset($visa_img) }}" alt="Visa" class="img">
            </div>
            <!-- Column 2: Title -->
            <div class="flex items-center justify-center">
                <h1 class="text-s font-normal card-title text-center">Visa Cards Issued</h1>
            </div>
            <!-- Column 3: Data -->
            <div class="flex items-center justify-center">
                <span class="text-m font-semibold text-gray-800">{{ $visa }}</span>
            </div>

            <!-- Row 3 -->
            <!-- Column 1: Image -->
            <div class="flex items-center justify-center">
                <img src="{{ asset($rupay_img) }}" alt="Rupay" class="img">
            </div>
            <!-- Column 2: Title -->
            <div class="flex items-center justify-center">
                <h1 class="text-s font-normal card-title text-center">Rupay Cards Issued</h1>
            </div>
            <!-- Column 3: Data -->
            <div class="flex items-center justify-center">
                <span class="text-l font-semibold text-gray-800">{{ $rupay }}</span>
            </div>
        </div>
    </div>
</body>

</html>

