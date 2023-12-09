<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // method conventions
    // 1. index - show a list of resources
    // 2. create - show form to create a new resource
    // 3. store(Request $request) - storing a new resource in the db
    // 4. show($id) - show a specific resource
    // 5. edit($id) - show form to edit a resource
    // 6. update(Request $request, $id) logic for updating a resource in the db
    // 7. destroy($id) - logic for deleting a resource from the db
    public function index()
    {
        // Logic for displaying a list of products
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
