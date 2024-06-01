<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Reverb</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div id="card" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8f4f3] pr-4 pl-4">
            <div>
                <a href="{{ route('home') }}">
                    <h2 class="font-bold text-3xl">
                        Realtime <span class="bg-blue-500 text-white px-2 rounded-md">Chat</span>
                    </h2>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form id="form" autocomplete="off">
                    @csrf
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="" value="" />
                        <input type='text' name='message' placeholder='Ketik pesan anda ..' id='messageText' class="w-full rounded-md py-2.5 px-4 border text-sm outline-blue-500"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit" type="button" onclick="submitForm()" class="ms-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>

            {{--  --}}
            <div id="chatMessage" class="w-full sm:max-w-md mt-2 py-4 sm:rounded-lg">

            </div>

        </div>
    </div>
    <script>
        function submitForm() {
            const form = document.getElementById("form");
            const submitButton = document.getElementById("submit");
            var formData = new FormData(form);

            var text = document.getElementById("messageText").value;
            if(text == "") {
                alert("Ketik pesan anda ..");
                return false;
            }

            submitButton.textContent = "Memproses ..";
            submitButton.disabled = true;
            
            fetch("{{ route('sendMessage') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    
                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan saat melakukan request.');
                    }
                    form.reset(); 
                    return response.text();
                })
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                })
                .finally(() => {
                    submitButton.textContent = "Kirim";
                    submitButton.disabled = false;
                });
        }

        window.onload = function() {

            var channel = Echo.channel('channel-reverb');
            channel.listen("SendMessageEvent", function(data) {

                const card = document.getElementById("chatMessage");

                card.innerHTML += 
                `
                    <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <h1>${data.message}</h1>
                    </div>
                `
            });

            console.log('Listening for messages on channel...');

            // Prevent form submission on Enter key
            const form = document.getElementById("form");
            const messageInput = document.getElementById("messageText");
            form.addEventListener('submit', function(event) {
                event.preventDefault();
            });
            messageInput.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    submitForm();
                }
            });
            
        }
    </script>
</body>

</html>
