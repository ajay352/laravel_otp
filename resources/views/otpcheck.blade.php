<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind OTP Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@if(session('error'))
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <p>{{ session('error') }}</p>
  </div>
@endif
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-80">
            <h2 class="text-2xl font-semibold mb-4">Enter OTP</h2>
            <form onsubmit="return validateOTP();" action="{{route ('otpverification')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="otp" class="block text-gray-700 font-medium">One Time Password (OTP)</label>
                    <input type="text" id="otp" name="otp" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter your OTP" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg w-full">Submit</button>
            </form>
        </div>
    </div>

    
    
</body>
<script>
    function validateOTP() {
        const otpInput = document.getElementById('otp');
        const otp = otpInput.value;
        const otpPattern = /^\d{5}$/;

        if (!otpPattern.test(otp)) {
            alert('Please enter a valid OTP with exactly 5 digits.');
            otpInput.focus();
            return false;
        }

        return true;
    }
</script>


</html>
