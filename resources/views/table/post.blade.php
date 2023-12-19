<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


    <title>Document</title>

</head>

<body>
    <a class="btn btn-primary " href="/ck">Qua Trang Ckeditor</a>
     <table id="myTable" class="table border">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Body</th>
            </thead>
                <tbody>
                </tbody>

     </table>


</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
       $(document).ready(function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("post-data") !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'slug', name: 'slug' },
                    { data: 'body', name: 'body' },
                ]
            });
        });
    </script>
</html>
