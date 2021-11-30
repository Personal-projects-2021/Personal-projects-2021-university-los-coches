<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Admin\Service;
use App\Models\Admin\Type;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Timer\Duration;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.services.index')->only('index');
        $this->middleware('can:admin.services.create')->only('create', 'store');
        $this->middleware('can:admin.services.edit')->only('edit', 'update');
        $this->middleware('can:admin.services.destroy')->only('destroy');
    }

    private $durations = [
        '00:15:00' => '15 min',
        '00:30:00' => '30 min',
        '00:45:00' => '45 min',
        '01:00:00' => '60 min',
        '01:30:00' => '90 min',
        '02:00:00' => '120 min',
    ];

    public function index()
    {
        $services = Service::orderBy('type_id')->get();
        return view('admin.services.index', compact('services'));
    }

   public function create()
    {
        $durations = $this->durations;
        $types = Type::pluck('name', 'id');

        return view('admin.services.create', compact('durations', 'types'));
    }

    public function store(ServiceRequest $request)
    {
        $service = Service::create($request->only('name', 'price', 'duration', 'type_id'));
        $name =  $service->name;
        Alert::success("Servicio $name", 'Ha sido creado correctamente');
        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        $durations = $this->durations;
        $types = Type::pluck('name', 'id');
        return view('admin.services.edit', compact('service', 'durations', 'types'));
    }

    public function update(ServiceRequest $request, Service $service)
    {   
        $service->update($request->only('name', 'price', 'duration', 'type_id'));
        $name = $service->name;
        toast("Servicio $name, ha sido actualizado correctamente",'success');
        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        $name = $service->name;
        $service->delete();
        Alert::info("Servicio $name", "Se ha eleminado correctamente");
        return redirect()->route('admin.services.index');
    }

}
