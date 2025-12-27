<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'طباعة')</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
       /* ===== GLOBAL PRINT STYLE ===== */
.print-invoice {
    background: #fff;
    padding: 30px;
    border-radius: 6px;
    font-family: 'Cairo', sans-serif;
    color: #333;
}

.print-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 3px solid #f1c40f; /* أصفر رسمي */
    padding-bottom: 15px;
    margin-bottom: 25px;
}

.print-header h2 {
    margin: 0;
    font-weight: 700;
}

.company-box {
    text-align: left;
    font-size: 14px;
    color: #555;
}

.print-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.print-info div {
    width: 48%;
}

.print-table th {
    background: #fdf4d7; /* أصفر فاتح */
    color: #333;
    font-weight: bold;
}

.print-table td, .print-table th {
    padding: 12px;
}

.print-footer {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #555;
}

.signature {
    text-align: center;
    margin-top: 50px;
}

.signature span {
    display: block;
    border-top: 1px solid #aaa;
    margin-top: 10px;
    padding-top: 5px;
}

/* PRINT MODE */
@media print {
    body {
        background: #fff;
    }
    .modal,
    .modal-backdrop,
    .no-print {
        display: none !important;
    }
}

    </style>
</head>
<body>

@yield('content')

</body>
</html>
