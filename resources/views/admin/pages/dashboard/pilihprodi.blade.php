<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Program Studi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body>
    <div class="container-fluid">
        <!-- Card layout for filter form with consistent styling -->
        <div class="card">
            <div class="card-body">
                <!-- Centered heading -->
                <h1 class="h3 mb-4 text-gray-800" style="text-align: center;">Filter Program Studi</h1>
                <form method="GET" action="{{ route('dashboardFilter') }}">
                    <label for="prodi" class="text-xs font-weight-bold">Pilih Program Studi:</label>
                    <select name="prodi" id="prodi" class="text-gray-800" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 2px solid #00B9AD; border-radius: 4px;">
                        @foreach($programstudi as $category => $prodis)
                        <optgroup label="{{ $category }}">
                            @foreach($prodis as $prodi)
                            <option value="{{ $prodi }}">{{ $prodi }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                    <button type="submit" style="width: 100%; padding: 12px; background-color: #00B9AD; color: white; font-weight: bold; font-size: 18px; border: none; border-radius: 4px; cursor: pointer; transition: 0.3s;">
                        Filter
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Including the common footer layout -->
    @include('admin.layouts.footer')
</body>

</html>