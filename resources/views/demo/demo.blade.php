<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- sweet alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.5.2/sweetalert2.all.min.js" integrity="sha512-BxYyPKB5YiKpVNj1mI6zYKXIlYHMf01TjQmd0quagAfADNcOcf8mkTBNOGVjsS7tSVDYgU0GEqFbSk7NtnUFKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <form action="">

        <input type="text">
        <button type="button" id="sweetalert">submit</button>
    </form>

    <table>
        @foreach ($data as $hello)
        <tr>
            <td>{{$hello->name}}</td>
            <td>
                <form action="" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" onclick="myFunction()">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

<script>
    function myFunction(){
        Swal.fire({
            title: 'Delete!',
            text: 'Do you want to Delete',
            icon: 'error',
            confirmButtonText: 'Cool',
            })
    }
</script>

</html>