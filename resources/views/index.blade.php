<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to My Website</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-purple-500">
  <div class="flex max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 items-center justify-center h-screen flex-col">
    <h1 class="text-5xl font-bold text-green-400">Welcome buddy......</h1><br>
    <a href="{{route('login')}}" class="bg-blue-500 hover:bg-blue-700 text-white px-10 py-2 rounded shadow">Login</a>
  </div>
</body>
</html>
