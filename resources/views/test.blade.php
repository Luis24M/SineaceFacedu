<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body class="container-fluid bg-secondary-subtle flex d-flex flex-col justify-content-center align-items-center">
    <div class="card-body">
    <form method="post" action="/files" enctype="multipart/form-data">
            @csrf
            <h3 class="mb-5 text center self-center">Drive form<h3>
            <div class="mb-3">
                <label>File Name</label>
                <input type="text" name="file_name" class="form-control">
                @error('file_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" name="file" class="form-control">
                @error('file')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ">Upload</button>
        </form>
    </div>
</body>