@if(Session::has('success'))
<div class="fixed top-4 right-4">
    <p id="message" class="px-4 py-2 font-bold text-2xl bg-green-600 text-white">{{session('success')}}</p>
    <script>
        setTimeout(() => {
            $('message').fadeOut(1000);
        }, 1000);
    </script>
</div>
@endif