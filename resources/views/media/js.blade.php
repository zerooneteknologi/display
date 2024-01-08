@push('script')
{{-- jquery form --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>

<script src="https://cdn.rawgit.com/23/resumable.js/master/resumable.js"></script>

<script>
    // previe 
    function imgPreview() {
        const file = document.querySelector('#gallery_path').files[0];
        const imgPreview = document.querySelector('#imagePreview');
        const videoPreview = document.querySelector('#videoPreview');
        const gallery_path =  document.querySelector('#gallery_path');

        imgPreview.classList.add('d-none')
        videoPreview.classList.add('d-none')

        gallery_path.required = false;

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

    // resumable
    const resumable = new Resumable({
                        target:'{{ route('upload')}}',
                        query:{_token:'{{ csrf_token() }}' },
                        chunkSize: 10 * 1024 * 1024,
                        simultaneousUploads: 4,
                        testChunks: false,
                    });
    resumable.assignBrowse(document.getElementById('gallery_path'));
    const button = document.querySelector('.btn-primary');
    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        resumable.upload();
                        $('#uploadModal').modal('show');
                    });
    resumable.on('fileProgress', function () {
                        const progress = Math.floor(resumable.progress() * 100);
                        document.querySelector('.progress-bar').style.width = progress + '%';
                        document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);
                        document.querySelector('.progress-bar').innerHTML = progress + '%';
                    })
    resumable.on('fileSuccess', function(file, response){
                        const form = document.querySelector('#upload');
                        const input = document.querySelector('#fileName');
                        response = JSON.parse(response)
                        input.value = response.fileName;
                        form.submit();
                    });
    // })
</script>
@endpush