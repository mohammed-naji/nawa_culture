<?php

namespace App\Exports;

use App\Models\Enrolled;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EnrolledExport implements FromView
{
    public function view(): View
    {
        return view('exports.enrollments', [
            'data' => Enrolled::all()
        ]);
    }
}
