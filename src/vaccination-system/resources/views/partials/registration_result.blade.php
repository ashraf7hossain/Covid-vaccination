<div class="container p-6 mx-auto">
  @if(isset($registration))
  <div class="p-4 bg-green-100 text-green-700 border border-green-300 rounded">
    <h2 class="text-lg font-semibold">Registration Status</h2>
    <p><strong>Name:</strong> {{ $registration->name }}</p>
    <p><strong>Status:</strong> {{ $registration->status }}</p>
    <p><strong>Scheduled Date:</strong> {{ $registration->scheduled_date }}</p>
  </div>
  @elseif(isset($notRegistered))
  <div class="p-4 bg-yellow-100 text-yellow-700 border border-yellow-300 rounded">
    Not registered. <a href="{{ route('register.create') }}" class="text-blue-600 hover:underline">Click here to register.</a>
  </div>
  @endif
</div>