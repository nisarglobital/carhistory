<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller as Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the plans.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new plan.
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created plan in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'required|string',
            'plan_type'         => 'required|in:report_based,subscription_based',
            'number_of_reports' => 'nullable|integer',
            'price_per_report'  => 'nullable|numeric',
            'total_cost'        => 'required|numeric',
            'subscription_term' => 'nullable|integer',
            'monthly_cost'      => 'nullable|numeric',
            'discount'          => 'nullable|numeric|min:0|max:100',
            'total_savings'     => 'nullable|numeric',
            'billing_cycle'     => 'nullable|in:monthly,annually,allowed_numbers,one_time',
            'description'       => 'nullable|string',
            'features'          => 'nullable|string',
        ]);

        $data = $request->all();
        if ($request->filled('features')) {
            $features = preg_split('/\r\n|[\r\n,]+/', $request->features);
            $features = array_map('trim', $features);
            $features = array_filter($features);
            $data['features'] = json_encode($features); // Convert to JSON
        }

        Plan::create($data);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Show the form for editing the specified plan.
     */
    public function edit(Plan $plan)
    {
        // Convert the features array back to newline-separated string
        $plan->features = implode("\n", json_decode($plan->features, true));
        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Update the specified plan in the database.
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'required|string',
            'plan_type'         => 'required|in:report_based,subscription_based',
            'number_of_reports' => 'nullable|integer',
            'price_per_report'  => 'nullable|numeric',
            'total_cost'        => 'required|numeric',
            'subscription_term' => 'nullable|integer',
            'monthly_cost'      => 'nullable|numeric',
            'discount'          => 'nullable|numeric|min:0|max:100',
            'total_savings'     => 'nullable|numeric',
            'price'             => 'numeric',
            'billing_cycle'     => 'nullable|in:monthly,annually,allowed_numbers,one_time',
            'description'       => 'nullable|string',
            'features'          => 'nullable|string',
        ]);

        $data = $request->all();
        if ($request->filled('features')) {
            $features = preg_split('/\r\n|[\r\n,]+/', $request->features);
            $features = array_map('trim', $features);
            $features = array_filter($features);
            $data['features'] = json_encode($features); // Convert to JSON
        }

        $plan->update($data);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified plan from the database.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully.');
    }

    /**
     * return plans by category name only
     * @param $category
     * @return mixed
     */
    public function getPlanByCategory($category='B2C')
    {
        $plans = Plan::where('category',$category)->get();
        /*$plans->map(function ($plan) {
            $plan->features = implode("\n", json_decode($plan->features, true));
        });*/
        return $plans;
    }
}
