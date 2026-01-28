<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>e-Branch BCA - Simulasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --bca-blue: #0066cc;
            --bca-dark-blue: #003d7a;
            --bca-light-blue: #e6f2ff;
        }

        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-bca {
            background: linear-gradient(135deg, var(--bca-blue) 0%, var(--bca-dark-blue) 100%);
            box-shadow: 0 2px 10px rgba(96, 62, 62, 0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .container-custom {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .card-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,102,204,0.2);
        }

        .card-menu .card-body {
            padding: 30px;
            text-align: center;
        }

        .card-menu i {
            font-size: 3rem;
            color: var(--bca-blue);
            margin-bottom: 15px;
        }

        .card-menu h5 {
            color: #333;
            font-weight: 600;
            margin: 0;
        }

        .btn-bca {
            background: var(--bca-blue);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-bca:hover {
            background: var(--bca-dark-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,102,204,0.3);
        }

        .btn-outline-bca {
            border: 2px solid var(--bca-blue);
            color: var(--bca-blue);
            background: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-bca:hover {
            background: var(--bca-blue);
            color: white;
        }

        .wizard-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .wizard-steps::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 10%;
            right: 10%;
            height: 2px;
            background: #ddd;
            z-index: 0;
        }

        .wizard-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .wizard-step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #ddd;
            color: #999;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 10px;
            border: 3px solid white;
        }

        .wizard-step.active .wizard-step-circle {
            background: var(--bca-blue);
            color: white;
        }

        .wizard-step.completed .wizard-step-circle {
            background: #28a745;
            color: white;
        }

        .wizard-step-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }

        .wizard-step.active .wizard-step-label {
            color: var(--bca-blue);
            font-weight: 600;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 12px 15px;
        }

        .form-control:focus {
            border-color: var(--bca-blue);
            box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.15);
        }

        .info-box {
            background: var(--bca-light-blue);
            border-left: 4px solid var(--bca-blue);
            padding: 15px 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .info-box i {
            color: var(--bca-blue);
            margin-right: 10px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: #666;
            font-weight: 500;
        }

        .summary-value {
            color: #333;
            font-weight: 600;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #28a745;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 3rem;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-bca">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                 <img src="{{ asset('images/logo-bca.png') }}"
                alt="BCA"
            style="height:42px;">
            </a>

        </div>
    </nav>

    <div class="container-custom">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>