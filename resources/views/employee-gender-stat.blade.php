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
            width: 80px;
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
    <div class="grid gap-4">
        <!-- First Row: Total Employees -->
        <div class="stat-card flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset($imagePath) }}" alt="Employees" class="img mr-4">
                <h1 class="text-lg font-normal card-title">Total Employees</h1>
            </div>
            <span class="text-xl font-semibold text-gray-800">{{ $employees }}</span>
        </div>

        <!-- Second Row: Male and Female -->
        <div class="grid grid-cols-2 gap-2">
            <!-- Male Column -->
            <div class="stat-card flex items-center justify-between">
                <div class="flex items-centerpr-1">
                    <img src="{{ asset($male_img) }}" alt="Male" class="img-sub mr-1">
                </div>
                <div class="flex flex-col items-center">
                    <!-- Column 2 Row 1: h1 -->
                    <h1 class="text-l font-normal card-title pb-1 text-center">Male</h1>
                    <!-- Column 2 Row 2: span -->
                    <span class="text-xl font-semibold text-gray-800">{{ $male }}</span>
                </div>
            </div>

            <!-- Female Column -->
            <div class="stat-card flex items-center justify-between">
                <div class="flex items-center pr-1">
                    <img src="{{ asset($female_img) }}" alt="Female" class="img-sub mr-1">
                </div>
                <div class="flex flex-col items-center">
                    <!-- Column 2 Row 1: h1 -->
                    <h1 class="text-l font-normal card-title pb-1 text-center">Female</h1>
                    <!-- Column 2 Row 2: span -->
                    <span class="text-xl font-semibold text-gray-800">{{ $female }}</span>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
