<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = User::where('editor', 0)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map->count();
    
        $totalEntradas = User::where('editor', 0)
            ->whereNotNull('cantidad_entradas')
            ->sum('cantidad_entradas');
    
        $usuariosPorCantidadEntradas = User::where('editor', 0)
            ->whereNotNull('cantidad_entradas')
            ->groupBy('cantidad_entradas')
            ->orderBy('cantidad_entradas')
            ->get(['cantidad_entradas', \DB::raw('count(*) as total')]);
    
        return view('admin.dashboard', [
            'usuarios' => $usuarios,
            'totalEntradas' => $totalEntradas,
            'usuariosPorCantidadEntradas' => $usuariosPorCantidadEntradas,
        ]);
    }

    public function index()
    {
        $noticias = News::with(['topico', 'tags'])->paginate(3); // Para ahorrar queryes al momento de buscar datos relacionados de la tabla noticias
        return view('admin.index', ['noticias' => $noticias]);
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function users_details(int $id)
    {
        return view('admin.user_details', ['user' => User::findOrFail($id)]);
    }

    public function details(int $id)
    {
        return view('admin.details', ['new' => News::findOrFail($id)]); // findOrFail -> Si no lo encuentra 404
    }

    public function create()
    {
        return view('admin.create', [
            'topico' => Topic::all(),
            'tags' => Tag::orderBy('nombre')->get(),
        ]);
    }

    public function creating(Request $request)
    {
        try {
            $data = $request->except(['_token']);
            DB::transaction(function () use ($data, $request) {
                if ($request->hasFile('img')) {
                    $data['img'] = $request->file('img')->store('imgs');
                }
                $request->validate(
                    [
                        'titulo' => 'required|min:2',
                        'subtitulo' => 'required',
                        'parrafo' => 'required',
                        'fecha_creacion' => 'required',
                        'editor' => 'required',
                        'publicado' => 'required',
                        'topico_id' => 'required|exists:topicos'
                    ],
                    [
                        'titulo.required' => 'El titulo es necesario.',
                        'titulo.min' => 'El titulo tiene un minimo de dos caracteres',
                        'subtitulo.required' => 'El sub titulo es necesario.',
                        'parrafo.required' => 'El parrafo es necesario.',
                        'fecha_creacion.required' => 'La fecha de creación es necesario.',
                        'editor.required' => 'El editor es necesario.',
                        'publicado.required' => 'Es necesario saber si esta publicado al momento de crearlo.',
                        'topico_id.required' => 'Es necesario saber el topico',
                        'topico_id.exists' => 'Debe de existir el topico'
                    ]
                );
                $new = News::create($data);
                $new->tags()->attach($request->input('tags', []));
            });
            return redirect('/admin/noticias')
                ->with('status', ['type' => 'success', 'message' => 'La noticia <b>' . e($data['titulo']) . '</b> se cargó con éxito.']);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('status', ['type' => 'error', 'message' => 'La noticia: <b> ' . e($request->input('titulo')) . '</b> no pudo ser creada'])
                ->withInput();
        }
    }

    public function edit(int $id)
    {
        return view('admin.edit', [
            'new' => News::findOrFail($id),
            'topico' => Topic::all(),
            'tags' => Tag::orderBy('nombre')->get(),
        ]);
    }

    public function editing(int $id, Request $request)
    {
        try {
            $new = News::findOrFail($id);
            DB::transaction(function () use ($new, $request) {
                $request->validate(
                    [
                        'titulo' => 'required|min:2',
                        'subtitulo' => 'required',
                        'parrafo' => 'required',
                        'fecha_creacion' => 'required',
                        'editor' => 'required',
                        'publicado' => 'required',
                        'topico_id' => 'required|exists:topicos'
                    ],
                    [
                        'titulo.required' => 'El titulo es necesario.',
                        'titulo.min' => 'El titulo tiene un minimo de dos caracteres',
                        'subtitulo.required' => 'El sub titulo es necesario.',
                        'parrafo.required' => 'El parrafo es necesario.',
                        'fecha_creacion.required' => 'La fecha de creación es necesario.',
                        'editor.required' => 'El editor es necesario.',
                        'publicado.required' => 'Es necesario saber si esta publicado al momento de crearlo.',
                        'topico_id.required' => 'Es necesario saber el topico',
                        'topico_id.exists' => 'Debe de existir el topico'
                    ]
                );

                $data = $request->except('_token');
                $oldImg = null;
                if ($request->hasFile('img')) {
                    $data['img'] = $request->file('img')->store('imgs');
                    $oldImg = $new->img;
                }
                $new->update($data);
                $new->tags()->sync($data['tags'] ?? []);
                if ($oldImg && Storage::has($oldImg)) {
                    Storage::delete($oldImg);
                }
            });
            return redirect('/admin/noticias')
                ->with('status', ['type' => 'success', 'message' => 'La noticia: <b> ' . e($request->input('titulo')) . '</b> fue editada con éxito']);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('status', ['type' => 'error', 'message' => 'La noticia: <b> ' . e($request->input('titulo')) . $e->getMessage() . '</b> no pudo ser editada'])
                ->withInput();
        }
    }

    public function delete(int $id)
    {
        return view('admin.delete', [
            'new' => News::findOrFail($id),
        ]);
    }

    public function deleting(int $id)
    {
        try {
            DB::beginTransaction();
            $new = News::findOrFail($id);
            $new->tags()->detach();
            $new->delete();
            if ($new->img && Storage::has($new->img)) {
                Storage::delete($new->img);
            }
            DB::commit();
            return redirect('/admin/noticias')
                ->with('status', ['type' => 'success', 'message' => 'La noticia <b>' . e($new->titulo) . '</b> fue eliminada']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('status', ['type' => 'error', 'message' => 'La noticia <b>' . e($new->titulo) . '</b> no pudo ser eliminada']);
        }
    }
}
