<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classroom</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="{{ asset('js/app.js')}}"></script>
</head>

<body>
    @include('header')
    <br>
    @if (Auth::user()->user_type == 'Admin')
        <div class="TargetAbc2">
            <div class="btnBack">
                <a href="{{ url()->previous() }}" class="go-back-btn">←</a>
            </div>
            <h2>Modificar Tarea</h2>
            <div>
                <form action="/modificar-task" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input value="{{$Task['id']}}" name="id" type="hidden">
                    <input value="{{$Task['title']}}" type="text" name="title" placeholder="Titulo"><br>
                    <input value="{{$Task['description']}}" type="text" name="description" placeholder="Descripcion"><br>
                    <label for="autism_lvl">Nivel de autismo:</label><br>
                    <select name="autism_lvl">
                        <option value="1" {{ $Task['autism_lvl'] == 1 ? 'selected' : '' }}>Nivel 1</option>
                        <option value="2" {{ $Task['autism_lvl'] == 2 ? 'selected' : '' }}>Nivel 2</option>
                    </select>
                    <br><br>
                    <label>Clases:</label><br>
                    @foreach($clases as $clase)
                        <input type="checkbox" name="clases[]" value="{{ $clase->id }}" {{ $Task->clases->contains($clase->id) ? 'checked' : '' }}> {{ $clase->nombre }}<br>
                    @endforeach
                    <br>
                    <img class="responsive-image" src="{{ asset('public/src/images/' . $Task['pathImg']) }}"><br><br><br>
                    <label for="pathImg" class="custom-file-upload">
                        Subir imagenes
                    </label>
                    <br><br>
                    <div id="pathImg2">{{$Task['pathImg']}}</div>
                    <input id="pathImg" name="pathImg" type="file" style="display: none;" multiple/>
                    <button class="success">Modificar</button>
                </form>            
            </div> 
        </div>  
        <script>
            document.getElementById('pathImg').addEventListener('change', function() {
                var fileName = this.files[0].name;
                document.getElementById('pathImg2').textContent = 'Subido: ' + fileName;
            });
        </script>     
    @else
        <script type="text/javascript">
            function redirect() {
                window.location = "";
            }
            window.onload = redirect;
        </script>    
    @endif    
</body>