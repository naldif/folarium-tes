<?php

namespace App\Http\Controllers\Account;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jabatan::latest()->get();
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
        return view('pages.account.jabatan.index');
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
            'nama_jabatan'   => 'required|unique:jabatans,nama_jabatan',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);	
        }else{
            $query = Jabatan::updateOrCreate([
                'id' => $request->id
            ],
            [
                'nama_jabatan' => $request->nama_jabatan,
          
            ]);
       
        
            if(!$query){
                return response()->json(['code'=>0,'msg'=>'Something went wrong']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Jabatan has been successfully saved']);
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
        $perm = Jabatan::find($id);
 
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
    public function destroy(Jabatan $jabatan)
    {
        $query = $jabatan->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Jabatan has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }
}
