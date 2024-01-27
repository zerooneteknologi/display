<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<script>
    // perdurasian
    const videoItems = document.querySelectorAll('.video');

    videoItems.forEach(videoItem => {
        const videoElement = videoItem.querySelector('video')
        videoElement.addEventListener('loadedmetadata', function() {
            videoItem.setAttribute('data-bs-interval', Math.floor(videoElement.duration * 1000));
        });
    });

    // slide on/off video
    $(document).ready(function() {
        $('#videoCarousel').on('slide.bs.carousel', function(e) {
            // Pause the current video when sliding to the next item
            var currentVideo = $(e.relatedTarget).find('video')[0];
            if (currentVideo) {
                currentVideo.pause();
            }
        });

        $('#videoCarousel').on('slid.bs.carousel', function(e) {
            // Play the video of the current item when the slide is complete            
            var currentVideo = $(e.relatedTarget).find('video')[0];
            if (currentVideo) {
                currentVideo.play();
            }
        });
    });
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

    // auto reload
    function autoRefresh() {
        window.location = window.location.href;
    }
    setInterval(autoRefresh(), (3*3600000));
    // setInterval('autoRefresh()', (6*3600000));
</script>

</body>

</html>