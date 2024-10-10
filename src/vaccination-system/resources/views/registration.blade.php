<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaccine Registration</title>
  <!-- Add any CSS here, or link to Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
  <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Vaccine Registration</h1>

    <div class="info mb-6 text-center text-md">

      @if ($errors->any())
      <div class="mb-4">
        <ul class="list-disc list-inside text-red-700 bg-red-100 p-4 border border-red-300 rounded">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if (session('success'))
      <div class="mb-4">
        <div class="p-4 bg-green-100 text-green-700 border border-green-300 rounded">
          {{ session('success') }}
        </div>
      </div>
      @endif
    </div>




    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
      <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <!-- User NID -->
        <div class="mb-4">
          <label for="nid" class="block text-sm font-medium text-gray-700">NID</label>
          <input type="text" name="nid" id="nid" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <!-- User Name -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <!-- User Email -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <!-- Vaccine Center Dropdown -->
        <div class="mb-4">
          <label for="vaccine_center" class="block text-sm font-medium text-gray-700">Vaccine Center</label>
          <select name="vaccine_center_id" id="vaccine_center" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            <option value="" disabled selected>Select a vaccine center</option>
            @foreach ($vaccinationCenters as $center)
            <option value="{{ $center->id }}">{{ $center->name }}</option>
            @endforeach
          </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
          <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-lg shadow-lg hover:bg-indigo-700">Register</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>