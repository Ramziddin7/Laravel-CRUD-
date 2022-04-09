<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderByDesc('created_at')->paginate(20);

        return view('companies.index',[
            'companies'=> $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->validate([
           'name'=>'required | min:4',
           'address'=> 'required',
           'phone'=>['required','numeric']
       ]);
       $company = new Company();
       $company->name = $data['name'];
       $company->address = $data['address'];
       $company->phone = $data['phone'];
       $company->save();
       return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company)               // public function show( company $company)
    {                                            //bo'lsa  findOrFail qiloishni ham hojati yo'q
      $company = Company::findOrFail($company);  //findOrFail company modeldan izlaydi agar tashkilotn
      return view('companies.show',[             //topolmasa not found chiqaradi find($id) esa faqat aytilgan
          'company' => $company                  // ma'lumotni uzini chiqaradi yo'q bo'lsa debag ochilib qoladi
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',[
            'company'=>$company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company) //Bu yerda Company tushib qolishi
    {                                                         //jiddiy xatolarga olib keladi
        $data = $request->validate([
            'name'=>'required | min:4',
            'address'=> 'required',
            'phone'=>['required','numeric']
        ]);

        $company->update($data);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();//malumotni bazadan o'chirib tashlaydi
        return redirect()->route('companies.index');
        // soft delete tushunchasi ham bor , u esa savatchaga saqlab boraveradi uning uchun migration qilib qilishimiz kerak!

    }
}
