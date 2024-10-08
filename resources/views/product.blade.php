
@extends('layouts.app')
@section('title', 'Product')

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      @section('content')

        <!-- Modal  Edit-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                </div>
                <div class="modal-body">
                    <form id="formEdit">
                        <div class="alert alert-success successEditAlert" role="alert" style="display:none;">

                        </div>
                        <div class="alert alert-danger dangerEditAlert" role="alert" style="display:none;">

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control name" id="editName exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control price" id="editPrice exampleFormControlInput2" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control description" name="description" id="editDescription exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image (Opsional)</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormImage" class="form-label">Image existing</label>
                            <img class="form-control editImage" style="width: 100px;" src="" name="image" id="exampleFormImage"></img>
                        </div>
                        <button type="button" class="btn btn-primary" id="btnEdit">Update Product</button>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal  Detail -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Product</h1>
                </div>
                <div class="modal-body">
                    <form id="formDetail">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input disabled type="text" name="name" class="form-control name" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Price</label>
                            <input disabled type="number" name="price" class="form-control price" id="exampleFormControlInput2" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea disabled class="form-control description" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormImage2" class="form-label">Image Existing</label>
                            <img class="form-control image" style="width: 100px" src="" name="image" id="exampleFormImage2"></img>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
      <div class="main">
        @if (session('role_id') == '1')
            <form id="formPost">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control name" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control price" id="exampleFormControlInput2" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control description" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                </div>
                <button type="button" class="btn btn-primary" id="btnSubmit">Add Product</button>
            </form>
        @endif
        <h1 style="color:black;">Ini dashboard, Hai {{$name}}</h1>
        <div class="alert alert-success successAlert" role="alert" style="display:none;">

          </div>
          <div class="alert alert-danger dangerAlert" role="alert" style="display:none;">

          </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr data-id="{{$item['id']}}">
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td><img style="width: 100px;"
                        @if ($item['image']  != null)
                                src="http://127.0.0.1:8000/{{$item['image']}}"
                        @else
                                src="https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg"
                        @endif
                                alt=""></td>
                        <td><div class="d-flex">
                            <button data-id="{{$item['id']}}" data-name="{{$item['name']}}" data-price="{{$item['price']}}" data-description="{{$item['description']}}" data-image="{{$item['image']}}"  data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary detailBtn">Detail</button>
                            @if (session('role_id') == '1')
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$item['id']}}" data-name="{{$item['name']}}" data-price="{{$item['price']}}" data-description="{{$item['description']}}" data-image="{{$item['image']}}" class="btn btn-warning editBtn">Edit</button>
                                <button class="btn btn-danger delete-btn" data-id="{{$item['id']}}">Delete</button>
                            @endif
                        </div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      @endsection

      <script>

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var form = $('#formPost')[0];
            $('#btnSubmit').click(function() {
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route("product.store") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.dangerAlert').hide();
                        $('.successAlert').html(response.success).show();

                        var imageUrl = response.data.image ? `${response.data.image}` : 'https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg';
                        var imageUrl2 = response.data.image ? `http://127.0.0.1:8000/${response.data.image}` : 'https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg';
                        var newRow = `
                            <tr>
                                <td>${response.data.name}</td>
                                <td>${response.data.price}</td>
                                <td>${response.data.description}</td>
                                <td>
                                    <img style="width: 100px;" src="${imageUrl2}" alt="">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button data-id="{{$item['id']}}" data-name="{{$item['name']}}" data-price="{{$item['price']}}" data-description="{{$item['description']}}" data-image="${imageUrl}"  data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary detailBtn">Detail</button>
                                        @if (session('role_id') == '1')
                                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$item['id']}}" data-name="{{$item['name']}}" data-price="{{$item['price']}}" data-description="{{$item['description']}}" data-image="${imageUrl}" class="btn btn-warning editBtn">Edit</button>
                                            <button class="btn btn-danger delete-btn" data-id="{{$item['id']}}">Delete</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('table tbody').prepend(newRow);

                        setTimeout(function() {
                            $('.successAlert').hide();
                            $('.name').val('');
                            $('.price').val('');
                            $('.description').val('');
                        }, 4000);
                    },
                    error: function(error) {
                        if (error) {
                            $('.dangerAlert').html(error.responseJSON.error).show();
                        }
                    }
                });
            });

            $(document).on('click', '.editBtn', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var description = $(this).data('description');
                var image = $(this).data('image');

                // Set data in modal input
                $('#formEdit input[name="name"]').val(name);
                $('#formEdit input[name="price"]').val(price);
                $('#formEdit textarea[name="description"]').val(description);
                $('#formEdit').data('id', id);

                // Set the image src in the detail modal
                if (image) {
                    $('#exampleFormImage').attr('src', 'http://127.0.0.1:8000/' + image);
                } else {
                    $('#exampleFormImage').attr('src', 'https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg');
                }
            });

            $(document).on('click', '.detailBtn', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var description = $(this).data('description');
                var image = $(this).data('image');

                // Set data in modal input
                $('#formDetail input[name="name"]').val(name);
                $('#formDetail input[name="price"]').val(price);
                $('#formDetail textarea[name="description"]').val(description);
                $('#formDetail').data('id', id);

                // Set the image src in the detail modal
                if (image) {
                    $('#exampleFormImage2').attr('src', 'http://127.0.0.1:8000/' + image);
                } else {
                    $('#exampleFormImage2').attr('src', 'https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg');
                }
            });

            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                var row = $(this).closest('tr'); // Dapatkan baris tabel yang sesuai
                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: '{{ route("product.delete", ":id") }}'.replace(':id', id), // Pastikan route ini benar
                        method: 'get', // Menggunakan metode DELETE yang lebih tepat
                        success: function(response) {
                            if (response.success) {
                                $('.dangerAlert').hide();
                                $('.successAlert').html(response.success).show();
                                // Menghapus baris tabel setelah penghapusan berhasil
                                row.remove();

                                setTimeout(function() {
                                    $('.successAlert').hide();
                                }, 4000);
                            }
                        },
                        error: function(error) {
                            if (error.status === 404) {
                                $('.successAlert').hide();
                                $('.dangerAlert').html(error.responseJSON.error).show();
                                setTimeout(function() {
                                    $('.dangerAlert').hide();
                                }, 4000);
                            }
                        }
                    });
                }
            });

            // Handle update form submission
            $('#formEdit button[type="button"]').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var id = $('#formEdit').data('id');
                // var name = $('#formEdit input[name="name"]').val();
                // var price = $('#formEdit input[name="price"]').val();
                // var description = $('#formEdit input[name="description"]').val();

                var form = $('#formEdit')[0];
                var formData = new FormData(form);
                $.ajax({
                    url: '{{ route("product.update", ":id") }}'.replace(':id', id),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.successEditAlert').html(response.success).show();
                        $('#editName').html(response.data.name);
                        $('#editPrice').html(response.data.price);
                        $('#editDescription').html(response.data.description);

                        if(response.data.image != null){
                            $('#exampleFormImage').attr('src', 'http://127.0.0.1:8000/' + response.data.image);
                        }

                        // Update row in table
                        var row = $(`tr[data-id="${response.data.id}"]`);
                        row.find('td').eq(0).text(response.data.name);
                        row.find('td').eq(1).text(response.data.price);
                        row.find('td').eq(2).text(response.data.description);

                        // Update image
                        var imageUrl = response.data.image ? `${response.data.image}` : 'https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg';
                        var imageUrl2 = response.data.image ? `http://127.0.0.1:8000/${response.data.image}` : 'https://i.pinimg.com/474x/9b/47/a0/9b47a023caf29f113237d61170f34ad9.jpg';
                        row.find('td').eq(3).find('img').attr('src', imageUrl2);

                        // Update attributes for Edit and Detail buttons
                        row.find('.editBtn').data('name', response.data.name);
                        row.find('.editBtn').data('price', response.data.price);
                        row.find('.editBtn').data('description', response.data.description);
                        row.find('.editBtn').data('image', imageUrl);

                        row.find('.detailBtn').data('name', response.data.name);
                        row.find('.detailBtn').data('price', response.data.price);
                        row.find('.detailBtn').data('description', response.data.description);
                        row.find('.detailBtn').data('image', imageUrl);

                        setTimeout(function() {
                            $('.successEditAlert').hide();
                        }, 4000);
                    },
                    error: function(error) {
                        if(error) {
                            $('.dangerEditAlert').html(error.responseJSON.error).show();
                            setTimeout(function() {
                                $('.dangerEditAlert').hide();
                            }, 4000);
                        }
                    }
                });
            });
        });
    </script>

  </body>
</html>
