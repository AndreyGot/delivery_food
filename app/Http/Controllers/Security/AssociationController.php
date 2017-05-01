<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Association;
use App\Model\Category;

class AssociationController extends Controller
{
    public function AssociationsList()
    {
        $associations = Association::all();
        return view('admin.association.associations', [
            'associations' => $associations,
        ]);
    }

    public function addFormAssociation()
    {
        $association = new Association;

        return view('admin.association.addFormAssociation', [
            'association' => $association,
            'action' => route('admin_add_association'),
        ]);
    }

    public function addAssociation(Request $request)
    {
        $requestData = $request->all();

        $association = new Association;
        $association->fill($requestData);
        $association->save();

        return redirect(route('admin_associations_list'));
    }

    public function deleteAssociation(Association $association)
    {
        try {
            $association->delete();
        } catch (Exception $e) {
            $message = 'cant delete assotiation';
        }
        return redirect(route('admin_associations_list'));
    }


    public function editFormAssociation(Association $association)
    {
        return view('admin.association.addFormAssociation', [
            'association' => $association,
            'action' => route('admin_edit_association', [$association]),
        ]);
    }

    public function editAssociation(Request $request, Association $association)
    {
        $requestData = $request->all();
        $association->fill($requestData);
        $association->save();
        return redirect(route('admin_associations_list'));
    }
}
