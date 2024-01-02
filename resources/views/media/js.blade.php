@push('script')
{{-- jquery form --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>

<script>
    // previe 
    function imgPreview() {
        const file = document.querySelector('#gallery_path').files[0];
        const imgPreview = document.querySelector('#imagePreview');
        const videoPreview = document.querySelector('#videoPreview');
        imgPreview.classList.add('d-none')
        videoPreview.classList.add('d-none')

        if (file) {
            if (file.type.startsWith('video')) {
                videoPreview.classList.remove('d-none')
                const videoURL = URL.createObjectURL(file);
                videoPreview.src = videoURL;
            } else if (file.type.startsWith('image')) {
                imgPreview.classList.remove('d-none')
                const reader = new FileReader();
        
                reader.addEventListener("load", () => {
                    imgPreview.src = reader.result;
                }, false);
        
                if (file) {
                    reader.readAsDataURL(file);
                }
            } else {
                imgPreview.classList.add('d-none')
                videoPreview.classList.add('d-none')
                alert('Hanya file video dan gambar');
            }
        }

    }

    // progressbar
    var SITEURL = "{{URL('')}}";
    $(function() {
        $(document).ready(function() {

            var bar = $('.progress-bar')
            $('form').ajaxForm({
                beforeSend: function () {
                    var percenVal = '0%';
                    bar.width(percenVal);
                    bar.html(percenVal);
                },
                uploadProgress: function(event, position, total, percenComplite) {
                    $('#uploadModal').modal('show');
                    var percenVal = percenComplite + '%';
                    bar.width(percenVal);
                    bar.html(percenVal);
                },
                success: function (response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                }
            });
        })
    })

    // type
    $('#gallery_type').on('change', function() {
        var gallery_path =  $('#gallery_path');
        var link =  $('#link');
        
        if ($(this).val() == 'image' || $(this).val() == 'video') {
            gallery_path.attr('type', 'file').prop('disabled', false);
            link.attr('type', 'text').prop('disabled', true);
        } else {
            gallery_path.attr('type', 'file').prop('disabled', true);
            link.attr('type', 'text').prop('disabled', false);
        }
        
    })
</script>
@endpush