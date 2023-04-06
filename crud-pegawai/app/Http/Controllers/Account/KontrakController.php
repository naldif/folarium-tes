<?php

namespace App\Http\Controllers\Account;

use App\Models\Kontrak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kontrak::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                  
                    // $btn = '<button class="btn btn-primary waves-effect waves-light btn-sm" data-id="'.$row['id'].'"  id="edit"><i class="fas fa-pencil-alt"></i></button> ';

                    // $btn = $btn .'<button class="btn btn-danger waves-effect waves-light btn-sm" data-id="'.$row['id'].'" id="delete"><i class="fas fa-trash-alt"></i></button> '. method_field('delete') . csrf_field() .'
                    // ';
                    
                    return '
                   
            
                    <button class="btn btn-primary waves-effect waves-light btn-sm" data-id="'.$row['id'].'" id="edit"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger waves-effect waves-light btn-sm" data-id="'.$row['id'].'" id="delete"><i class="fas fa-trash-alt"></i></button>
                           ';
                    // return $btn;
                
                })
              
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($permissions);
        return view('pages.account.kontrak.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_kontrak'   => 'required|unique:kontraks,jenis_kontrak',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);	
        }else{
            $query = Kontrak::updateOrCreate([
                'id' => $request->id
            ],
            [
                'jenis_kontrak' => $request->jenis_kontrak,
          
            ]);
       
        
            if(!$query){
                return response()->json(['code'=>0,'msg'=>'Something went wrong']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Jenis Kontrak has been successfully saved']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perm = Kontrak::find($id);
 
        return response()->json($perm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontrak $kontrak)
    {
        $query = $kontrak->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Jabatan has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }
}
