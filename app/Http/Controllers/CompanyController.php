<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\NewCompanyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct ()
    {
        $this->middleware( 'auth' );
    }

    public function index ()
    {
        $companies = Company::paginate( 10 );
        return view( 'companies.index', compact( 'companies' ) );
    }

    public function create ()
    {
        return view( 'companies.create' );
    }

    public function store ( Request $request )
    {
        // Validate Data -> Redirect back if not valid
        $this->validateData( $request );

        // Store new company
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $request->has( 'logo' ) ? $this->logoHandler( $request->logo ) : null;
        $company->save();

        /*
        * Send Email
        * let's do it in a simple way
        * In a real scenario I'll use [ event + jobs ]
        */
        Mail::to( 'email@email.com' )->send( new NewCompanyMail() );

        return redirect( route( 'companies.show', $company->id ) )->with( 'status', __( 'app.created' ) );

    }

    private function validateData ( Request $request )
    {
        $request->validate( [
            'name' => 'required|min:5|max:150',
            'logo' => 'bail|sometimes|image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100'
        ] );
    }

    private function logoHandler ( $logo )
    {
        $logoPath = time() . '.' . $logo->getClientOriginalExtension();
        return $logo->storeAs( 'logos', $logoPath );
    }

    public function show ( Company $company )
    {
        return view( 'companies.show', compact( 'company' ) );
    }

    public function edit ( Company $company )
    {
        return view( 'companies.edit', compact( 'company' ) );
    }

    public function update ( Request $request, Company $company )
    {
        // Validate Data -> Redirect back if not valid
        $this->validateData( $request );
        // Update the company
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ( $request->has( 'logo' ) ) {
            Storage::delete( $company->logo );
            $path = $this->logoHandler( $request->logo );
        }
        $company->logo = $path ?? $company->logo;
        $company->update();
        return redirect( route( 'companies.show', $company->id ) )->with( 'status', __( 'app.updated' ) );
    }

    public function destroy ( Company $company )
    {
        if ( $company->logo ) {
            Storage::delete( $company->logo );
        }
        $company->delete();
        return redirect( route( 'companies.index' ) )->with( 'status', __( 'app.deleted' ) );
    }
}
