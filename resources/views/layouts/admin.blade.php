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

        /* Card */
        .card {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fff;
            padding: 10px 20px;
        }

        .card-header h5 {
            margin-left: -10px;
            display: inline-block;
            font-size: 18px;
            font-weight: 500;
            background: #315287;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .card-body {
            padding: 20px;
        }

        /* Form Elements */
        .form-container {
            width: 100%;
            max-width: 1000px;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group textarea {
            width: 100%;
            min-height: 100px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            resize: vertical;
            font-family: 'Montserrat', sans-serif;
        }

        /* buttons */
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-bottom: 20px;
            font-size: 11px;
        }

        .btn-blue,
        .btn-green,
        .btn-yellow {
            margin: 0;
            display: inline-block;
            font-weight: 500;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .btn-blue {
            background: #315287;
            color: white;
        }

        .btn-green {
            background: #28A745;
            color: white;
        }

        .btn-yellow {
            background: #FFC107;
            color: white;
        }

        .upload-photo {
            width: 130px;
            height: 160px;
            background-color: #E5E5E5;
            border: 1px solid #828282;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 20px;
            max-width: 1000px;
            position: relative;
        }

        .upload-photo .upload-text {
            font-size: 18px;
            color: #6c757d;
        }

        .upload-photo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            display: none;
            /* Hide preview by default */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Include Navbar -->
    @include('navbar.white_admin')

    <!-- Include Sidebar -->
    @include('sidebar.sidebar_admin')

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>
</body>

<script>
    function confirmSubmit(entryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Once submitted, this entry cannot be edited anymore!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('submit-form-' + entryId).submit();
            }
        })
    }
</script>


</html>
