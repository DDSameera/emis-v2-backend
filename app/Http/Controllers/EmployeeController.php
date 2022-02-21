<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\MultipleEmployeeFormRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Arr;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JsonResponseHandler;
use Throwable;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $emp = Employee::with(['salaries', 'designations'])->get();

        return JsonResponseHandler::successResponse('List of Employees', EmployeeResource::collection($emp));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws Throwable
     */
    public function store(EmployeeRequest $request)
    {


        $data = $request->validated();

        $employees = Arr::except($data, ['salaries', 'designations']);
        $salaries = $data['salaries'];
        $designations = $data['designations'];

        return DB::transaction(function () use ($employees, $salaries, $designations) {
            $emp = Employee::create($employees);
            $emp->salaries()->createMany($salaries);
            $emp->designations()->createMany($designations);

            return JsonResponseHandler::successResponse('Success', new EmployeeResource($emp->load(['salaries', 'designations'])));
        });

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $employee = Employee::with('salaries', 'designations')->where('emp_no', $id)->first();
        return JsonResponseHandler::successResponse('Employee Data', EmployeeResource::make($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EmployeeRequest $request, $id)
    {

        $data = $request->validated();
        $salaries = $data['salaries'];
        $designations = $data['designations'];

        $emp = Employee::where('emp_no', $id)->first();

        $emp->salaries()->update($salaries);
        $emp->designations()->update($designations);

        return JsonResponseHandler::successResponse(new EmployeeResource($emp->load(['salaries', 'designations'])));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }
}
