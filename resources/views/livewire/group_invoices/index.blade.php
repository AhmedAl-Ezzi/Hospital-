
@extends('dashboard.layouts.master')

@section('content')


      <main role="main" class="main-content">
         <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <livewire:group-invoices/>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

      </main> <!-- main -->

@endsection

