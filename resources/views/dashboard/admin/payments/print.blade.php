{{-- @extends('dashboard.admin.layout.print')

@section('title', 'سند قبض')

@section('content')
<div class="invoice-box" id="print">

    <div class="invoice-header">
        <div>
            <h2 class="invoice-title">سند قبض</h2>
        </div>
        <div class="company-info">
            <strong>برنامج إدارة المستشفى</strong><br>
            201 المهندسين<br>
            Tel: 011111111<br>
            Email: hospital@gmail.com
        </div>
    </div>

    <hr>

    <div class="mb-4">
        <div class="info-row">
            <span><strong>تاريخ الإصدار:</strong></span>
            <span>{{ $payment->date }}</span>
        </div>

        <div class="info-row">
            <span><strong>اسم المريض:</strong></span>
            <span>{{ $payment->patients->name }}</span>
        </div>
    </div>

    <table class="table table-bordered text-center">
        <thead class="thead-light">
        <tr>
                <th style="width:10%">#</th>
        <th style="width:60%">البيان</th>
        <th style="width:30%">المبلغ</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>{{ $payment->description }}</td>
            <td>{{ number_format($payment->amount, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <div class="text-left mt-4">
        <button onclick="window.print()" id="print_Button" class="btn btn-danger">
            🖨 طباعة
        </button>
    </div>

</div>
@endsection --}}











<div class="modal fade" id="print{{ $payment->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" id="printArea{{ $payment->id }}">
                <div class="print-invoice">

                    <div class="print-header">
                        <h2>سند قبض</h2>
                        <div class="company-box">
                            <strong>برنامج إدارة المستشفى</strong><br>
                            201 المهندسين<br>
                            ☎ 011111111<br>
                            ✉ hospital@gmail.com
                        </div>
                    </div>

                    <div class="print-info">
                        <div>
                            <p><strong>تاريخ الإصدار:</strong> {{ $payment->date }}</p>
                        </div>
                        <div>
                            <p><strong>اسم المريض:</strong> {{ $payment->patients->name }}</p>
                        </div>
                    </div>

                    <table class="table table-bordered text-center print-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>البيان</th>
                                <th style="width:180px">المبلغ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $payment->description }}</td>
                                <td>{{ number_format($payment->amount,2) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="print-footer">
                        <div class="signature">
                            المستلم
                            <span>التوقيع</span>
                        </div>
                        <div class="signature">
                            المحاسب
                            <span>التوقيع</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-warning"
                        onclick="printPayment('printArea{{ $payment->id }}')">
                    <i class="fas fa-print"></i> طباعة
                </button >

                <button class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>

        </div>
    </div>
</div>


