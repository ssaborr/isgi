<?php

namespace App\Http\Controllers;

use App\Models\anne;
use App\Models\semaine;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $startDate = '2024-03-01';
        $endDate = '2024-03-31';
        $excludedDates = ['2024-03-05', '2024-03-12', '2024-03-19']; // Example excluded dates
        
        $weeks = [];
        
        $currentDate = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        
        while ($currentDate->lte($end)) {
            if ($currentDate->dayOfWeek !== Carbon::SUNDAY) {
                $weekStart = $currentDate->copy();
                
                // Move forward to find the end of the week (next Saturday)
                while ($currentDate->dayOfWeek !== Carbon::SATURDAY && $currentDate->lte($end)) {
                    // Check if the current date is not in the array of excluded dates
                    if (!in_array($currentDate->toDateString(), $excludedDates)) {
                        $weekEnd = $currentDate->copy();
                    }
                    $currentDate->addDay();
                }
                
                // If the end of the week exceeds the end date, adjust it
                $weekEnd = $weekEnd->min($end);
                
                // Add the start and end dates of the week to the weeks array
                $weeks[] = ['start' => $weekStart->copy(), 'end' => $weekEnd->copy()];
            }
            
            // Move to the next day
            $currentDate->addDay();
        }
        
        // Output the weeks with their start and end dates
        foreach ($weeks as $week) {
            echo "Week Start: " . $week['start']->toDateString() . ", Week End: " . $week['end']->toDateString() . "\n";
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     */
    public function show(anne $anne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(anne $anne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, anne $anne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(anne $anne)
    {
        //
    }
}
