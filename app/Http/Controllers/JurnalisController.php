<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class JurnalisController extends Controller
{
    public function index()
    {
        $data['jurnalis'] = User::where('level','jurnalis')->get();
        return view('admin.page.jurnalis.kelola_jurnalis',$data);
    }
    public function hapus_jurnalis($id)
    {
        User::where('id',$id)->delete();
        return redirect()->to('/admin/kelola_jurnalis')->with('delete','delete sucessfully');
    }
    public function konfirmasi_jurnalis($id)
    {
        $status = request()->status;
        
        if($status == 'nonactive'){
            $status = 'active';
        }else{
            $status = 'nonactive';
        }
        
        $data = [
            'status' => $status
        ];

        User::where('id',$id)->update($data);
        return redirect()->to('/admin/kelola_jurnalis')->with('success','activasi sucessfully');

    }
}
