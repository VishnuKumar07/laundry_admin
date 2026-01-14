@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">

    <div class="row g-4">

        <div class="col-xl-4 col-md-6">
            <div class="border-0 shadow-sm card" style="min-height:130px;">
                <div class="py-4 card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-muted">Total Vendors</h6>
                        <h3 class="mb-0 fw-bold count-number" data-count="{{ $vendorCount }}">1</h3>
                    </div>
                    <div class="text-white icon bg-primary rounded-circle d-flex align-items-center justify-content-center"
                        style="width:50px;height:50px;">
                        <i class="fas fa-store"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="border-0 shadow-sm card" style="min-height:130px;">
                <div class="py-4 card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-muted">Total Branches</h6>
                        <h3 class="mb-0 fw-bold count-number" data-count="{{ $branchCount }}">1</h3>
                    </div>
                    <div class="text-white icon bg-success rounded-circle d-flex align-items-center justify-content-center"
                         style="width:50px;height:50px;">
                        <i class="fas fa-code-branch"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="border-0 shadow-sm card" style="min-height:130px;">
                <div class="py-4 card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-muted">Total Customers</h6>
                        <h3 class="mb-0 fw-bold count-number" data-count="{{ $customerCount }}">1</h3>
                    </div>
                    <div class="text-white icon bg-warning rounded-circle d-flex align-items-center justify-content-center"
                         style="width:50px;height:50px;">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {

        $('.count-number').each(function () {
            const $this = $(this);
            const finalValue = parseInt($this.data('count'));
            const duration = 2000;

            $({ countNum: 1 }).animate(
                { countNum: finalValue },
                {
                    duration: duration,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(finalValue);
                    }
                }
            );
        });

    });
</script>
@endsection
