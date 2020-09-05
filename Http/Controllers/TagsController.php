<?php

namespace Modules\Tags\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Gate;

use App\Helpers\Functions;
use App\Models\Menu;
use Modules\Tags\Models\Tag;

use Modules\Tags\Http\Requests\TagRequest;

class TagsController extends Controller
{

    protected $menu_id;
    protected $menu_icon;
    protected $menu_name;
    protected $slug;
    protected $folder;
    protected $combine_filds;    
    
    public function __construct()
    {
        $slug = Functions::get_menuslug();
        $menu = Menu::where('slug',$slug)->first();
        $this->slug = $slug;        

        $this->folder = config('tags.folder');
        if($menu){
            $this->menu_id = is_null($menu->parent_id) ? $menu->id : $menu->parent_id;
            $this->menu_icon = $menu->icons;
            $this->menu_name = $menu->name;
            $keysFilds = explode(',',$menu->fields_active);
            $titlesFilds = explode(',',$menu->fields_title);
            $combineFilds = array_combine($keysFilds, $titlesFilds);
            $this->combine_filds = $combineFilds;
        }else{
            $this->menu_id = null;
        }
    }

    public function index(Request $request, Tag $tag)
    {  
        if( Gate::denies("manager_{$this->slug}") ) 
            abort(403, 'Você não tem permissão para gerenciar esta página');

        $menu_id = $this->menu_id;
        $menu_icon = $this->menu_icon;
        $menu_name = $this->menu_name;
        $slug = $this->slug;
        $combine_filds = $this->combine_filds;

        if(!is_null($menu_id)){
            $tags = $tag->where('menu_id', $menu_id)->orderBy('name', 'asc')->paginate(50);
            return view('Tag::index', compact('tags', 'menu_icon', 'menu_name', 'slug', 'combine_filds'));
        }else{
            abort(403, 'Página não encontrada');
        }
    }

    public function create(Tag $tag)
    {
        if( Gate::denies("manager_{$this->slug}") ) 
            abort(403, 'Você não tem permissão para gerenciar esta página');

        $menu_id = $this->menu_id;
        $menu_icon = $this->menu_icon;
        $menu_name = $this->menu_name;
        $slug = $this->slug;
        $combine_filds = $this->combine_filds;

        return view('Tag::create', compact('menu_id', 'menu_icon', 'menu_name', 'slug', 'combine_filds'));
    }

    public function store(TagRequest $request)
    {
        if( Gate::denies("manager_{$this->slug}") ) 
            abort(403, 'Você não tem permissão para gerenciar esta página');

        $data = $request->only(array_keys($request->rules()));
        Tag::create($data);
        return redirect()->back()->with('success','Adicionado com sucesso!');
    }

    public function edit(Tag $tag)
    {
        if( Gate::denies("manager_{$this->slug}") ) 
            abort(403, 'Você não tem permissão para gerenciar esta página');

        $menu_id = $this->menu_id;
        $menu_icon = $this->menu_icon;
        $menu_name = $this->menu_name;
        $slug = $this->slug;
        $combine_filds = $this->combine_filds;

        return view('Tag::edit', compact('tag', 'menu_id', 'menu_icon', 'menu_name', 'slug', 'combine_filds'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        if( Gate::denies("manager_{$this->slug}") ) 
            abort(403, 'Você não tem permissão para gerenciar esta página');

        $data = $request->only(array_keys($request->rules()));
        $tag->fill($data);
        $tag->save();
        return redirect()->back()->with('success','Atualizado com sucesso');
    }

    public function destroy(Tag $tag)
    {
        if( Gate::denies("manager_{$this->slug}") ) 
            abort(403, 'Você não tem permissão para gerenciar esta página');
        
        $tag->delete();              
        return redirect()->back()->with('success','Excluído com sucesso!');
    }    


}