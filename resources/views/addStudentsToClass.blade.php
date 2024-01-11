<html lang="es">
<head>
    <title>Agregar Alumnos a la Clase</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="{{ asset('js/app.js')}}"></script>
</head>
<body>
    @include('header')
    <br>
    <div class="TargetTable">
        <h2>Agregar Alumnos a la Clase</h2>
        <form action="{{ route('clase.storeStudents', $clase->id) }}" method="POST">
            @csrf
            @if (count($students)>0)
                <div style="overflow: auto;">
                    <table>
                        <tr>
                            <th>Usuario</th>
                            <th>Nivel de Autismo</th>
                            <th>Agregar</th>
                        </tr>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->username }}</td>
                                <td>{{ $student->autism_lvl }}</td>
                                <td><input type="checkbox" name="students[]" value="{{ $student->id }}"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <h5>No hay usuarios para agregar.</h5>
            @endif
            <button type="submit" class="success">Agregar Seleccionados</button>
            <button><div class="btnBack">
                <a href="{{ route('clase.index') }}" class="go-back-btn">←</a>
            </div></button>
        </form>
    </div>
</body>
</html>
