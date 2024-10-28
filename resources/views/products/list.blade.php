<h1>Products</h1>
@if (Session::has('success'))
    <p class="sucess-message">{{Session::get('success')}}</p>
@endif
@if (Session::has('error'))
    <p class="error-message">{{Session::get('error')}}</p>
@endif
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Desc</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $item)
    <tr>
        <td><a href={{route('products.show',$item->id)}}>{{$item->name}}</a></td>
        <td>{{$item->description}}</td>
        <td>{{$item->price}}</td>
        <td><a href={{route('products.edit',$item->id)}}>Edit</a></td>
    </tr>    
    @endforeach        
</table>

<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }

    .sucess-message{
        color: white;
        background: #27ae60;
    }

    .error-message{
        color: white;
        background: #e74c3c;
    }


</style>