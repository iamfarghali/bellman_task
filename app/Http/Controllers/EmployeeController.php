<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct ()
    {
        $this->middleware( 'auth' );
    }

    public function index ()
    {
        $employees = Employee::paginate( 10 );
        return view( 'employees.index', compact( 'employees' ) );
    }

    public function create ()
    {
        $companies = Company::all();
        return view( 'employees.create', compact( 'companies' ) );
    }

    public function store ( Request $request )
    {
        // Validate Data -> Redirect back if not valid
        $this->validateData( $request );

        // Store new employee
        $employee = Employee::create( $request->all() );

        return redirect( route( 'employees.show', $employee->id ) )->with( 'status', __( 'app.created' ) );

    }

    private function validateData ( Request $request )
    {
        $request->validate( [
            'first_name' => 'bail|required|min:2|max:50',
            'last_name'  => 'bail|required|min:2|max:50',
            'email'      => 'sometimes',
            'phone'      => 'sometimes',
            'company_id' => 'bail|required|exists:companies,id',
        ] );
    }

    public function show ( Employee $employee )
    {
        return view( 'employees.show', compact( 'employee' ) );
    }

    public function edit ( Employee $employee )
    {
        $companies = Company::all();
        return view( 'employees.edit', compact( [ 'employee', 'companies' ] ) );
    }

    public function update ( Request $request, Employee $employee )
    {
        // Validate Data -> Redirect back if not valid
        $this->validateData( $request );
        // Update the employee
        $employee->update( $request->all() );
        return redirect( route( 'employees.show', $employee->id ) )->with( 'status', __( 'app.updated' ) );
    }

    public function destroy ( Employee $employee )
    {
        $employee->delete();
        return redirect( route( 'employees.index' ) )->with( 'status', __( 'app.deleted' ) );
    }
}
