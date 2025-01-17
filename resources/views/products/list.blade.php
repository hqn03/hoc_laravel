<h1>Products</h1>
@if (Session::has('success'))
    <p class="sucess-message">{{Session::get('success')}}</p>
@endif
@if (Session::has('error'))
    <p class="error-message">{{Session::get('error')}}</p>
@endif
<div class="link-btn-container">
    <a href={{route('products.create')}}>Create product</a>
    <a href={{route('products.trash')}}>Trash</a>
</div>
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Desc</th>
        <th>Price</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach ($products as $item)
    <tr>
        <td><a href={{route('products.show',$item->id)}}>{{$item->name}}</a></td>
        <td>{{$item->description}}</td>
        <td>{{$item->price}}</td>
        <td><a href={{route('products.edit',$item->id)}}>Edit</a></td>
        <td><a href='#' class='btn-delete' data-id="{{$item->id}}" data-name="{{$item->name}}">Delete</a></td>
    </tr>    
    @endforeach        
</table>
<form id='form-delete' method="POST">
    @csrf
    @method('DELETE')
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
    const formDelete = document.querySelector('#form-delete');
    const deleteBtns = document.querySelectorAll(".btn-delete");
    deleteBtns.forEach(item => {
        item.onclick = (e) => {
            const {id, name} = e.target.dataset;
            const confirmDelete = confirm(`Bạn có muốn xóa sản phẩm: ${name}`);
            if(!confirmDelete){
                return;
            }
            formDelete.action = `/products/${id}`;
            formDelete.submit();
        }
    });    
</script>