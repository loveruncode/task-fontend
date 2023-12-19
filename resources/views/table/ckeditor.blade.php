<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>CKEditor Form</title>



</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CKEditor Form</a>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <form action="{{url('/test')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>



                </div>


                <div class="form-group">
                    <label for="editor">Content:</label>

                 <textarea name="body" id="editor" cols="80" rows="10"></textarea>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success " href="/">Data-page</a>
            </form>
        </div>

    </div>
</div>


<script>
          ClassicEditor
          .create(document.querySelector('#editor'), {
            ckfinder: {
        uploadUrl: "{{ route('check') }}",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }

        })

        .catch(error => {
            console.error(error);
        });

        @if(session('success'))
        Toastify({
            text: '{{ session('success') }}',
            duration: 3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#33cc33',
        }).showToast();
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            Toastify({
                text: '{{ $error }}',
                duration: 3000,
                gravity: 'top',
                positionLeft: false,
                backgroundColor: '#ff6666',
            }).showToast();
        @endforeach
    @endif
</script>

</body>
</html>
