<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- ambil durasi --}}

<script>
    // function getDur(params) {
    //     // Menunggu video selesai dimuat sebelum mengakses durasinya
    //     const dur = document.getElementById('video' + params)
    //     const durResult = document.getElementById('dur' + params)

    //     const hasil = durResult.dataset.bsInterval = dur.duration

    //     // durResult.setAttribute('data-bs-interval', '545')
    //     console.log(hasil)

    // }
</script>

{{-- play --}}
<script>
    // Function to refresh the page
    function autoRefresh() {
        location.reload();
    }

    // Set a timeout for the auto-refresh (in milliseconds)
    setTimeout(autoRefresh, 1106000); // Refresh every 5000 milliseconds (5 seconds)
</script>

{{-- clock --}}
<script>
    function animation(span) {
        span.className = "turn";
        setTimeout(function() {
            span.className = ""
        }, 700);
    }

    function jam() {
        setInterval(function() {

            var waktu = new Date();
            var jam = document.getElementById('jam');
            var hours = waktu.getHours();
            var minutes = waktu.getMinutes();
            var seconds = waktu.getSeconds();

            if (waktu.getHours() < 10) {
                hours = '0' + waktu.getHours();
            }
            if (waktu.getMinutes() < 10) {
                minutes = '0' + waktu.getMinutes();
            }
            if (waktu.getSeconds() < 10) {
                seconds = '0' + waktu.getSeconds();
            }
            jam.innerHTML = '<span>' + hours + '</span>' +
                '<span>' + minutes + '</span>' +
                '<span>' + seconds + '</span>';

            var spans = jam.getElementsByTagName('span');
            animation(spans[2]);
            if (seconds == 0) animation(spans[1]);
            if (minutes == 0 && seconds == 0) animation(spans[0]);

        }, 1000);
    }

    jam();
</script>

</body>

</html>
