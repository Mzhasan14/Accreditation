<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Informasi Bisnis</title>
    <!-- Tambahkan Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            margin-top: 110px;
        }

        .header {
            background-color: #004085;
            color: white;
            padding: 40px 0px 15px 20px;
            position: fixed;
            left: 250px;
            top: 55px;
            right: 0;
            z-index: 900;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 600;
        }

        .header h3 {
            font-size: 11px;
            font-weight: 200;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }

        .pdf-viewer {
            width: 100%;
            height: 400px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        /* COMMENTS */
        .comments-section {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .comments-section h3 {
            margin-top: 0;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .detail-revisi-item {
            margin-bottom: 15px;
        }

        .detail-revisi-item label {
            font-weight: 500;
            margin-right: 10px;
        }

        .detail-revisi-item p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #333;
        }

        .status-section {
            margin: 10px 0;
        }

        .status-section input[type="radio"] {
            margin-right: 5px;
        }

        .status-section label {
            margin-right: 15px;
            font-size: 14px;
        }

        .status-section span {
            font-size: 12px;
            color: #666;
        }

        .comment-form textarea {
            width: 100%;
            height: 80px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }

        .comment-form button {
            background-color: #28a745;
            /* Green color to match "Kirim" button in image */
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .comment-form button:hover {
            background-color: #218838;
            /* Darker green on hover */
        }
    </style>

</head>

<body>
    <!-- Include Navbar -->
    @include('navbar.white_validator')

    <!-- Include Sidebar -->
    @include('sidebar.sidebar_validator')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: @json(session('success')),
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif


</body>

</html>
