<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
  
    
    public function index()
    {
        /* Irá buscar todas as notícias do DB*/
        $noticias = News::all();
        return view('index_noticias', ['noticias' => $noticias]);
        
    }

    
    public function create()
    {
        /* Irá buscar o formulário para criar uma nova notícia */
        return view('noticias_create');
    }

   
    public function store(Request $request)
    {
        /* Este método permite gravar as notícias no banco de dados */
        $noticia = new News;
        $noticia->titulo = $request->text_titulo;
        $noticia->texto = $request->text_texto;
        $noticia->autor = $request->text_autor;

            // Parte da visibilidade ou ñ da notícia
        if(isset($request->check_visivel)){
            $noticia->visivel = 1;
        
        }else {
            $noticia->visivel = 0; 
        }
            /* Salvar a notícia no BD*/
        $noticia->save();

            /* Logo após isso redirecionará para o início */
        return redirect('/');

    }

    /* Criação do método para a Gestão dos dados do BD */
    public function apresentargestaoTabelas(){
                    
         /* Carregar todas as notícias e apresentar em formato de tabelas para a gestão */
        $noticias = News::all();
        return view('noticias_gestao', compact('noticias'));


    }

    public function tornarVisivel($id){

        /* Tornar visível uma notícia que está invisivel */
            $noticia = News::find($id);
            $noticia->visivel = 1;
            $noticia->save();
            return redirect('gerir/noticias');

    }

    public function tornarInvisivel($id){

        /* Tornar visível uma notícia que está invisivel */
            $noticia = News::find($id);
            $noticia->visivel = 0;
            $noticia->save();
            return redirect('gerir/noticias');

    }

    

    
    public function edit($id)
    {
        /* Apresentar um formulário para editar uma notícia,
        pressupõe a apresentação dos dados da notícia no formulário
        
        */

        $noticia = News::find($id);
        return view('noticias_edit', compact('noticia'));

    }

    
    public function update(Request $request, $id)
    {
        
        /* Atualização dos dados da notícia no banco de dados */
        $noticia = News::find($id);

        /* Atualizar os dados */

        $noticia->titulo = $request->text_titulo;
        $noticia->texto = $request->text_texto;
        $noticia->autor = $request->text_autor;
        
        // Parte da visibilidade ou ñ da notícia
        
        if(isset($request->check_visivel))
        {
            $texto = 'estas aqui';
            dd($texto);

            // $noticia->visivel = 1;
            // $noticia->save();
            // echo('Atualizado');   
        
        
        }else {
            $texto = 'estas aqui';
            dd($texto); 
            // $noticia->visivel = 0;

            // $noticia->save();            
            // echo('Atualizado');
        }
        

   
    }

    
    public function destroy($id)
    {
        /* Irá ser usado para excluir uma notícia no banco de dados */
            $noticias = News::FindOrFail($id);
            $noticias->delete();
            echo ('Apagado');
    }

    
}
