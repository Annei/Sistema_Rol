<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use DB;

class Controladores extends Controller
{
    public function buscador(Request $request){


        $buscar = $request->buscar;
        if((intval($buscar))){
            $alumn = App\Alumnos::where('matricula', 'LIKE', $buscar)->get();
        }else{
            $alumn = App\Alumnos::where('apellidop', 'LIKE', $buscar)->get(); 
        }
        return view('buscador',compact('alumn'));
    }

    public function index(){
        return view('buscador');
    }
    public function vista()
    {
        $users = User::all();
        return view('alumnos.alumnos',compact('users'));
    }

    public function actualizar(){
        $alumn = App\Alumnos::All();

        foreach($alumn as $item){
            $carpeta = '../storage/App/public/documentos'.'/'. $item->matricula;

                if (!file_exists($carpeta)) {
                   mkdir($carpeta, 0777, true);
                         $carpeta1 = '../storage/App/public/documentos'.'/' . $item->matricula . '/Documentos_Personales';
                        mkdir($carpeta1, 0777, true);

                        $carpeta2 = '../storage/App/public/documentos'.'/' . $item->matricula . '/Boletas';
                        mkdir($carpeta2, 0777, true);

                        $carpeta3 = '../storage/App/public/documentos'.'/' . $item->matricula . '/Documentos_Oficiales';
                        mkdir($carpeta3, 0777, true); 
                }
        }
        return redirect('/')->with('mensaje', 'Actualización completada');

    }
    public function detalleAlumno($matricula){
        $info = App\Alumnos::where('matricula',$matricula)->first();
        //FALTA VALIDAR SI SE ENCUENTRA VACÍO 
        //$files = App\documentospersonales::all();
        $files = App\documentospersonales::where('matriculaAlumn', $matricula)->paginate(30);
        $files2 = App\boletas::where('matriculaAlumn', $matricula)->paginate(30);
        $files3 = App\documentosoficiales::where('matriculaAlumn', $matricula)->paginate(30);
        $loc = public_path();
        return view('upload',compact('info','loc'))->with('files', $files)->with('files2', $files2)->with('files3', $files3);
    }
    //funciones annei 
    public function index2(){

    	$files = App\Carpetas::all();

    	return view('upload')->with('files', $files);
    }

    public function store(Request $request,$matricula){
        
        $info = App\Alumnos::where('matricula',$matricula)->first();
        
    	$messages = [
    		'required' => 'Please select file to upload',
		];
    	$this->validate($request, [
    		'file' => 'required',
    	], $messages); 
    
            foreach ($request->file as $file) {
    
                        $filename = $info->matricula.'_'.$file->getClientOriginalName();
                        $filesize = $file->getClientSize();
                        $file->storeAs('app/public/Documentos/'.$info->matricula. '/'.'Documentos_Personales/',$filename);
                        $fileModel = new App\documentospersonales;
                        $fileModel->name = $filename;
                        $fileModel->size = $filesize;
                        $fileModel->matriculaalumn = $info->matricula;
                        $fileModel->location = 'app/public/Documentos/'.$info->matricula. '/'.'Documentos_Personales/'.$filename;
                        
                $fileModel->save();    		
            }
        //return redirect('upload')->with('success', 'File/s Uploaded Successfully');
        return back()->with('mensaje', 'Archivo subido subido correctamente');
    }
     public function store2(Request $request,$matricula){
        
        $info = App\Alumnos::where('matricula',$matricula)->first();
        
    	$messages = [
    		'required' => 'Please select file to upload',
		];
    	$this->validate($request, [
    		'file' => 'required',
    	], $messages); 
    
            foreach ($request->file as $file) {
               
                   

                    
                        $filename = $info->matricula.'_'.$file->getClientOriginalName();
                        $filesize = $file->getClientSize();
                        $file->storeAs('../public/Documentos/'.$info->matricula. '/'.'Boletas/',$filename);
                        $fileModel = new App\boletas;
                        $fileModel->name = $filename;
                        $fileModel->size = $filesize;
                        $fileModel->matriculaalumn = $info->matricula;
                        $fileModel->location = '../public/Documentos/'.$info->matricula. '/'.'Boletas/'.$filename;
                        
                    
                   
                
                $fileModel->save();    		
            }
        //return redirect('upload')->with('success', 'File/s Uploaded Successfully');
        return back()->with('mensaje', 'Archivo subido subido correctamente');
    }
    public function store3(Request $request,$matricula){
        
        $info = App\Alumnos::where('matricula',$matricula)->first();
        
    	$messages = [
    		'required' => 'Please select file to upload',
		];
    	$this->validate($request, [
    		'file' => 'required',
    	], $messages); 
    
            foreach ($request->file as $file) {
               
                   

                    
                        $filename = $info->matricula.'_'.$file->getClientOriginalName();
                        $filesize = $file->getClientSize();
                        $file->storeAs('../public/Documentos/'.$info->matricula. '/'.'Documentos_Oficiales/',$filename);
                        $fileModel = new App\documentosoficiales;
                        $fileModel->name = $filename;
                        $fileModel->size = $filesize;
                        $fileModel->matriculaalumn = $info->matricula;
                        $fileModel->location = '../public/Documentos/'.$info->matricula. '/'.'Documentos_Oficiales/'.$filename;
                        
                    
                   
                
                $fileModel->save();    		
            }
        //return redirect('upload')->with('success', 'File/s Uploaded Successfully');
        return back()->with('mensaje', 'Archivo subido subido correctamente');
    } 
    public function descarga($name,$matricula){
        //$des = App\documentospersonales::where('name',$name);
        //$location = public_path().'\\documentos'. '\\'.$matricula.'\\documentos_personales'.'\\'.$name;
        //$location1 = 'documentos/'.$matricula.'/documentos_personales'.'/'.$name;
        //return Storage::download($location1);
        //return Response::download('documentos'. '/'.$matricula.'/documentos_personales'.'/'.$name);
        //return response()->download($location1);
        return response()->download(storage_path("app/public/".'documentos'. '/'.$matricula.'/documentos_personales'.'/'.$name));
    }
    public function descarga2($name,$matricula){
        
        return response()->download(storage_path("app/public/".'documentos'. '/'.$matricula.'/boletas'.'/'.$name));
    }
    public function descarga3($name,$matricula){
        
        return response()->download(storage_path("app/public/".'documentos'. '/'.$matricula.'/documentos_oficiales'.'/'.$name));
    }
    
    public function deletefiles($name,$matricula)
    {
        
        $location = 'public/documentos'. '/'.$matricula.'/documentos_personales'.'/'.$name;
        $currentCarpeta = DB::table('documentospersonales')->where('name',$name)->delete();
        Storage::delete($location);

		return redirect()->back();
    }
    public function deletefiles2($name,$matricula)
    {
        
        $location = 'public/documentos'. '/'.$matricula.'/boletas'.'/'.$name;
        $currentCarpeta = DB::table('boletas')->where('name',$name)->delete();
        Storage::delete($location);

		return redirect()->back();
    }
    public function deletefiles3($name,$matricula)
    {
        
        $location = 'public/documentos'. '/'.$matricula.'/documentos_oficiales'.'/'.$name;
        $currentCarpeta = DB::table('documentosoficiales')->where('name',$name)->delete();
        Storage::delete($location);

		return redirect()->back();
    }

}
