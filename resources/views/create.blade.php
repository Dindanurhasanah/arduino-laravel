<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Upload Dokumentasi</title>

{{-- this is for drop and drog files--}}
    {{--  dropbox CDN  --}}  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

           <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9C27B0;
            color: white;
            text-align: center;
        }
        body {
            background-color: #EDF7EF
        }
    </style>
  </head>
  <body>
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Upload Dokumentasi</h2> 
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row">

    </div>
    {{-- this is form to uploade file   --}}   
    <form method="post" action="{{ route('infografis.store') }}" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        @csrf
        </form>
    </div>
       <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('infografis.index') }}" title="upload"> <i class="fa fa-upload fa-2x"></i>
                </a>
            </div>
        </div>
    </div>

      

    <script type="text/javascript">
    // this is code that we need to drop and drog in frontend by use jquery
        Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                // this is Ajax for post new data 
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("file/destroy") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
    </script>

  </body>
</html>	