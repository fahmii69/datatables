<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     *
     * @var EmployeeService
     */
    protected $employeeService;

    /**
     * Employee Post constructor
     *
     * @param EmployeeService $employeeService
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Disiplay a listing of the resource from database.
     *
     * @return View
     */
    public function index(): View
    {
        $company = Company::get();

        return view('index', ['companies' => $company]);
    }

    public function getEmployees(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::latest('id');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('companies', function ($data) {
                    return $data->companyFrom->company_name;
                })
                ->addColumn('aksi', function ($data) {
                    return view('employee.tombol')->with('data', $data);
                })
                ->make(true);
        }
    }

    /**
     * Disiplay to edit.blade.php page.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function edit(Employee $employee): JsonResponse
    {

        return response()->json($employee);
    }

    /**
     * Create new Employee.
     *
     * @param EmployeeStoreRequest $request
     * @return JsonResponse
     */
    public function store(EmployeeStoreRequest $request): JsonResponse
    {
        DB::transaction(function () use ($request) {

            $data = $request->only([
                'name', 'address', 'email', 'no_tlp', 'id_company',
            ]);

            $data = $this->employeeService->saveEmployeeData($data);
        });
        return response()->json(['success' => "Berhasil melakukan tambah data"]);
    }

    /**
     * Update employee.
     *
     * @param EmployeeUpdateRequest $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee): JsonResponse
    {
        DB::transaction(function () use ($request, $employee) {

            $data = $request->only([
                'name', 'address', 'email', 'no_tlp', 'id_company',
            ]);

            $data = $this->employeeService->updateEmployee($data, $employee);
        });

        return response()->json(['success' => "Berhasil melakukan update data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Employee::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'User successfully deleted',
        ]);
    }
}