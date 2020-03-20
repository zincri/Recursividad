<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RecursiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $id=1;
        /* $datos=DB::select("
        WITH RECURSIVE path(id, nombre, parent_id) AS (
            SELECT  id,nombre, parent_id FROM users WHERE id = ".$id."
            UNION
            SELECT
            users.id,
            users.nombre,
            users.parent_id
            FROM users, path as parentpath
            WHERE users.parent_id = parentpath.id
            )
            SELECT * FROM path;
        "); */
        $datos=DB::select("
        select * from sp_getred(".$id.")
        ");
        return response()->json($datos,200);
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id=1;
        $datos=DB::select("
        WITH RECURSIVE path(nombre, id,parent_id) AS (
            SELECT nombre, id, parent_id FROM users WHERE id = ".$id."
            UNION
            SELECT
            users.nombre,
            users.id,
            users.parent_id
            FROM users, path as parentpath
            WHERE users.parent_id = parentpath.id
            )
            SELECT * FROM path;
        ");
        //$datos = DB::select($sql_solicitud,array(1,10));
        return response()->json($datos,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
