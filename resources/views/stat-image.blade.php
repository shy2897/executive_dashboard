
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Google Fonts: Poppins -->
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS (if needed, otherwise remove this link) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        span{
            color: #252d60
        }
        .img{
            width: 70px;

        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="filament-stats-card grid grid-cols-2 items-center p-3 bg-white rounded-lg shadow">
        <!-- First Column: Image covering the full height -->
        <div class="col-span-1">
            <img src="{{ asset($imagePath) }}" alt="Processed" class="img">

        </div>
        <!-- Second Column: Two rows -->
        <div class="col-span-1 flex flex-col justify-center space-y-2 pl-0">
            <h1 class="text-m font-normal text-50">{{ $title }}</h1>
            <span class="text-xl font-semibold text-100">{{ $assets }}</span>

        </div>
    </div>
</body>
</html>

