<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Num</th>
        <th scope="col">ID</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
   @foreach ($permis as $permi)
      <tr>
         <td>{{$permi->Nom}}</td>
         <td>{{$permi->Prenom}}</td>
         <td>{{$permi->Num}}</td>
         <td>{{$permi->NumId}}</td>

         <td>
         <form style="display: inline;" action="{{route('permis.destroy',[$permi])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-outline-danger">Delete</button>
            <a type="button" class="btn btn-outline-warning" href="{{route('permis.edit',[$permi])}}">Update</a>
            <a type="button" class="btn btn-outline-info" href="{{route('permis.show',[$permi->id])}}">Info</a>
        </form>


         </td>

      </tr>

  @endforeach
    </tbody>

  </table>
