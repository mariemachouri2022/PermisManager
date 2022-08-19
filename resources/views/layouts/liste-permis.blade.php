<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Num</th>
        <th scope="col">ID</th>
      </tr>
    </thead>
    <tbody>
   @foreach ($permis as $permi)
      <tr>
         <td>{{$permi->Nom}}</td>
         <td>{{$permi->Prenom}}</td>
         <td>{{$permi->Num}}</td>
         <td>{{$permi->NumId}}</td>

      </tr>

  @endforeach
    </tbody>

  </table>
