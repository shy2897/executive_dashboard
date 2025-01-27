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
    <div class="grid grid-cols-2 gap-4">
        <!-- Column 1: Non-Performing Loan -->
        <div class="stat-card flex flex-col items-center justify-center">
            <!-- Row 1: Image -->
            <div class="flex items-center justify-center mb-4">
                <img src="{{ asset($international_img) }}" alt="Internation PG Users" class="img">
            </div>
            <!-- Row 2: Title -->
            <div class="mb-2">
                <h1 class="text-m font-normal card-title text-center">International Payment Gateway Users</h1>
            </div>
            <!-- Row 3: Data -->
            <div>
                <span class="text-xl font-semibold text-gray-800 text-center">{{ $international }}</span>
                {{-- <span class="text-xl font-semibold text-gray-800">{{ $nonPerformingLoan }}</span> --}}
            </div>
        </div>

        <!-- Column 2: Number of Loan Accounts -->
        <div class="stat-card flex flex-col items-center justify-center">
            <!-- Row 1: Image -->
            <div class="flex items-center justify-center mb-4">
                <img src="{{ asset($agency_img) }}" alt="Agency" class="img">
            </div>
            <!-- Row 2: Title -->
            <div class="mb-2">
                <h1 class="text-m font-normal card-title text-center">Agency Banking</h1>
            </div>
            <!-- Row 3: Data -->
            <div>
                <span class="text-xl font-semibold text-gray-800 text-center">{{ $agency }}</span>
                {{-- <span class="text-xl font-semibold text-gray-800">{{ $loanAccounts }}</span> --}}
            </div>
        </div>
    </div>
</body>

</html>
