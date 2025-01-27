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
            width: 70px;
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
        <div class="grid grid-cols-2 gap-2">
            <!-- Male Column -->
            <div class="stat-card flex items-center justify-between">
                <div class="flex items-centerpr-1">
                    <img src="{{ asset($account) }}" alt="Branches" class="img-sub mr-2">
                </div>
                <div class="flex flex-col items-center">
                    <!-- Column 2 Row 1: h1 -->
                    <h1 class="text-l font-normal card-title pb-1 text-center">Branches</h1>
                    <!-- Column 2 Row 2: span -->
                    <span class="text-xl font-semibold text-gray-800">{{ $branch }}</span>
                </div>
            </div>

            <!-- Female Column -->
            <div class="stat-card flex items-center justify-between">
                <div class="flex items-center pr-1">
                    <img src="{{ asset($client) }}" alt="Extansions" class="img-sub mr-2">
                </div>
                <div class="flex flex-col items-center">
                    <!-- Column 2 Row 1: h1 -->
                    <h1 class="text-l font-normal card-title pb-1 text-center">Extensions</h1>
                    <!-- Column 2 Row 2: span -->
                    <span class="text-xl font-semibold text-gray-800">{{ $extension }}</span>
                </div>
            </div>
        </div>

        <!-- Second Row: Non Performing Loan -->
        <div class="stat-card flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset($npl_img) }}" alt="NPL" class="img mr-4">
                <h1 class="text-l font-normal card-title pr-2">Non Performing Loan (NPL)</h1>
            </div>
            <span class="text-xl font-semibold text-gray-800">{{ $npl }}</span>
            {{-- <span class="text-xl font-semibold text-gray-800">{{ $totalEmployees }}</span> --}}
        </div>


    </div>
</body>
</html>
