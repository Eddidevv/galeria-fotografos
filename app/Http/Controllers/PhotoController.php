<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{



    public function index()
    {
        $photos = \App\Models\Photo::latest()->get();
        return view('admin-paste.admin', compact('photos'));

    }


    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Imagem obrigatória com tipos e tamanho permitido
            'title' => 'required|string|max:255',                         // Título obrigatório, máximo 255 caracteres
            'description' => 'nullable|string',                           // Descrição opcional
            'link' => 'nullable|url',                                     // Link opcional (deve ser uma URL válida)
            'folder' => 'nullable|string',                                // Pasta/coleção opcional
            'tags' => 'nullable|string',                                  // Tags opcionais
        ]);
    
        // Cria uma nova instância do modelo Photo
        $photo = new \App\Models\Photo();
    
        // Verifica se o campo 'image' existe no request e se o arquivo é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
    
            // Pega o arquivo de imagem enviado
            $requestImage = $request->image;
    
            // Recupera a extensão do arquivo (.jpg, .png etc.)
            $extension = $requestImage->extension();
    
            // Gera um nome único para a imagem com base no nome original e data/hora atual
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            // Move a imagem para a pasta 'public/img/photos' do projeto
            $requestImage->move(public_path('img/photos'), $imageName);
    
            // Salva o nome da imagem no banco de dados
            $photo->image = $imageName;
    
            // Salva o caminho relativo da imagem no banco (usado para exibir a imagem depois)
            $photo->path = 'img/photos/' . $imageName;
        }
    
        // Atribui os outros campos do formulário ao modelo
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->link = $request->link;
        $photo->collection = $request->folder;
        $photo->tags = $request->tags;
    
        // Salva os dados no banco de dados
        $photo->save();
    
        // Redireciona para a página de admin com uma mensagem de sucesso
        return redirect('admin')->with('msg', 'Upload de imagem realizado com sucesso!');
    }
    

    public function destroy(Photo $photo)
    {
        // Apaga o arquivo do storage
        if ($photo->path && file_exists(public_path($photo->path))) {
        unlink(public_path($photo->path));
        }

        $photo->delete();

        return redirect()->back()->with('success', 'Foto deletada com sucesso!');
    }

}
