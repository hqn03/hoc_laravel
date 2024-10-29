<h1>Trash</h1>
@if (Session::has('success'))
    <p class="sucess-message">{{Session::get('success')}}</p>
@endif
@if (Session::has('error'))
    <p class="error-message">{{Session::get('error')}}</p>
@endif
<div class="link-btn-container">
    <a href={{route('products.index')}}> < Back to list product</a>
</div>
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
        <td><a href="#" class='btn-restore' data-id="{{$item->id}}">Restore</a></td>
    </tr>    
    @endforeach        
</table>
<form id='form-restore' method="POST">
    @csrf
    @method('PUT')
</form>

<style>
    .link-btn-container{
        display: flex;
        gap:8px;
    }
    
    .link-btn-container a{
        padding: 16px 8px;
        background: #3498db;
        text-decoration: none;
        color:white;
    }

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

<script>
    const formRestore = document.querySelector('#form-restore');
    const restoreBtns = document.querySelectorAll(".btn-restore");
    restoreBtns.forEach(item => {
        item.onclick = (e) => {
            const {id} = e.target.dataset;
            formRestore.action = `trash/${id}`;
            formRestore.submit();
        }
    });    
</script>