<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $counts = User::selectRaw('
            SUM(role = "vendor")   as vendorCount,
            SUM(role = "branch")   as branchCount,
            SUM(role = "customer") as customerCount
        ')->first();

        return view('dashboard', [
            'vendorCount'   => $counts->vendorCount,
            'branchCount'   => $counts->branchCount,
            'customerCount' => $counts->customerCount,
        ]);
    }
}
