<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<!-- Header -->
<header class="bg-blue-800 text-white py-12 text-center shadow-lg">
    <h1 class="text-5xl font-extrabold">Job Information</h1>
</header>

<!-- Buttons Section -->
<main class="flex-grow flex items-center justify-center">
    <div class="flex flex-col space-y-6 text-center">
        <a href="job-details.php">
            <button class="border-2 border-blue-800 text-blue-800 hover:bg-blue-800 hover:text-white font-bold py-4 px-8 rounded transition duration-300 text-lg w-64">
                Job Details
            </button>
        </a>

        <a href="job-skills.php">
            <button class="border-2 border-blue-800 text-blue-800 hover:bg-blue-800 hover:text-white font-bold py-4 px-8 rounded transition duration-300 text-lg w-64">
                Job Skills
            </button>
        </a>

        <a href="job-responsibilities.php">
            <button class="border-2 border-blue-800 text-blue-800 hover:bg-blue-800 hover:text-white font-bold py-4 px-8 rounded transition duration-300 text-lg w-64">
                Job Responsibilities
            </button>
        </a>
    </div>
</main>

</body>
</html>
