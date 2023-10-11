<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel_otp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-80">
            <h2 class="text-2xl font-semibold mb-4">Subscribe</h2>
            <form onsubmit="return validateEmail();" action="{{ route('sendotp') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                    <input type="text" id="email" name="email" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter your email" >
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg w-full">Subscribe</button>
            </form>
        </div>
    </div>
</body>
<script>
    function validateEmail() {
        const emailInput = document.getElementById('email');
        const email = emailInput.value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            emailInput.focus();
            return false;
        }

        return true;
    }
</script>

</html>
