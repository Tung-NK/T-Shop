<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T-Shop - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Summer note CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css" />
    <!-- Dashboard CSS -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <!-- header here -->
    @include('admin.layouts.header')
    <div class="container-fluid">
        <!-- content here -->
        @yield('content')
    </div>
    <!-- Jquery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Summer note JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <!-- Sweet alert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @session('success')
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endsession
    @session('error')
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endsession

    <script>
        $(document).ready(function() {
            // Khi tài liệu HTML đã load hoàn toàn

            // Kích hoạt plugin DataTables cho bảng có class 'table' (thêm chức năng tìm kiếm, phân trang, sort)
            $('.table').DataTable();

            // Kích hoạt trình soạn thảo văn bản Summernote cho ô nhập liệu có class 'summernote'
            $('.summernote').summernote();

            // Kích hoạt dropdown menu (của Bootstrap) cho các nút có class 'dropdown-toggle'
            $('.dropdown-toggle').dropdown();
        })
    </script>

    <script>
        // Hàm hiện hộp thoại xác nhận xóa dữ liệu
        function deleteItem(id) {
            Swal.fire({
                title: "Are you sure?", // Tiêu đề popup
                text: "You won't be able to revert this!", // Nội dung cảnh báo
                icon: "warning", // Icon cảnh báo
                showCancelButton: true, // Hiển thị nút Cancel
                confirmButtonColor: "#3085d6", // Màu nút Confirm
                cancelButtonColor: "#d33", // Màu nút Cancel
                confirmButtonText: "Yes, delete it!" // Text nút Confirm
            }).then((result) => {
                // Nếu người dùng xác nhận (bấm Yes)
                if (result.isConfirmed) {
                    // Submit form có id tương ứng
                    document.getElementById(id).submit();
                }
            });
        }
    </script>

    <script>
        // Hàm gắn sự kiện 'thay đổi' cho input ảnh
        function handleImageInputChange(input, image) {
            document.getElementById(input).addEventListener('change', function() {
                readUrl(this, image); // Khi người dùng chọn file mới, gọi hàm đọc file
            });
        }

        // Hàm đọc file ảnh và hiển thị preview
        function readUrl(input, image) {
            if (input.files && input.files[0]) {
                let reader = new FileReader(); // Tạo đối tượng đọc file
                reader.onload = function(e) {
                    // Khi file đọc xong, gán ảnh vào thẻ <img> tương ứng và hiện ảnh ra
                    document.getElementById(image).classList.remove('d-none'); // Bỏ ẩn ảnh nếu có
                    document.getElementById(image).setAttribute('src', e.target.result); // Set src là nội dung file vừa đọc
                }
                reader.readAsDataURL(input.files[0]); // Đọc file dưới dạng URL base64
            }
        }

        // Gọi hàm gắn sự kiện onchange cho từng input ảnh
        handleImageInputChange('thumbnail', 'thumbnail_preview'); // Ảnh thumbnail
        handleImageInputChange('first_image', 'first_image_preview'); // Ảnh thứ nhất
        handleImageInputChange('second_image', 'second_image_preview'); // Ảnh thứ hai
        handleImageInputChange('third_image', 'third_image_preview'); // Ảnh thứ ba
    </script>

</html>
