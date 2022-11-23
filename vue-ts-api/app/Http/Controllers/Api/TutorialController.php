<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Tutorial\TutorialInterface;

class TutorialController extends Controller
{
    public $tutorial;

    public function __construct(TutorialInterface $tutorialInterface)
    {
        $this->tutorial = $tutorialInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = isset($_GET['title']) ? $_GET['title'] : '';

        return response()->json($this->tutorial->get($title));
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
        $data = $this->tutorial->store($request->all());
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Create Tutorial successfully'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Create Tutorial error'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->tutorial->show($id));
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
        $data = $this->tutorial->updateTutorial($id,$request->all());
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Update Tutorial successfully'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Update Tutorial error'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->tutorial->destroy($id));
    }

    public function deleteAll()
    {
        $data = $this->tutorial->deleteAll();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Delete Tutorial successfully'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Delete Tutorial error'
        ]);
    }
}
