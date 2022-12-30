<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>انبار داری مسجد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        *{
            direction: rtl;
        }
        body{
            background-color: rgb(255, 255, 255);
        }
        @media only screen and (max-width: 1000px) {
            .table{
                display: flex;
            }
            tr{
                display: flex;
                flex-direction: column;
            }
            .search{
                display: flex;
                flex-direction: column;
            }
            .sm-hid{
                display: none;
            }
        }
    </style>
</head>
<body class="container-fluid">
    <nav class="container-fluid mt-4 border p-2 d-flex border border-success search">
        <form method="POST" action="{{route('items.search')}}" class="d-flex search" >
            <div class="form-group d-flex align-items-center search">
                <label for="" class="mx-2">نام</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group d-flex align-items-center search">
                <label for="" class="mx-2">شناسه</label>
                <input type="text" class="form-control" name="code">
            </div>
            <div class="form-group d-flex align-items-center search">
                <label for="" class="mx-2">مکان</label>
                <select type="text" name="location" id="" placeholder="مکان" class="form-control form-select">
                    <option value="" selected>همه</option>
                    <option name="مسجد" id="" value="0">مسجد</option>
                    <option name="انبار" id="" value="1">انبار</option>
                    <option name="حسینیه" id="" value="2">حسینیه</option>
                    <option name="دفتر" id="" value="3">دفتر</option>
                </select>
            </div>
            <div class="form-group text-center d-flex align-items-center search">
                <td>
                    <label for="" class="mx-2">وقف</label>
                    <input type='hidden' value='0' name='is_vaghf'>
                    <input type="checkbox" class="form-check-input" id="check1" name="is_vaghf" value="1">
                </td>
            </div>
            <div class="form-group d-flex align-items-center mx-2 my-sm-2 my-xlg-0">
                @csrf
                <button type="submit" class="btn btn-info text-white w-100 align-self-stretch">جستجو</button>
            </div>
        </form>
        <button class="btn btn-warning color-dark my-sm-2 my-lg-0"><a href="/dashboard" class="text-decoration-none text-white">همه</a></button>
    </nav>


    <main class="container-fluid p-4 table-reponsive">
        <table class="table table-bordered ">
            <thead class="sm-hid">
                <tr>
                    <th>نام</th>
                    <th>کد شناسه</th>
                    <th>مکان</th>
                    <th>وقف</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
    
            <tbody>
                @if(Route::current()->getName() == "dashboard")
                        <tr>
                            <form action="{{route('items.create')}}" method="POST">
                                <div class="form-group">
                                    <td><input type="text" name="name" id="" placeholder="نام" class="form-control"></td>
                                </div>
                                <div class="form-group">
                                    <td><input type="text" name="code" id="" placeholder="کد شناسه" class="form-control"></td>
                                </div>
                                <div class="form-group">
                                    <td><select type="text" name="location" id="" placeholder="مکان" class="form-control form-select">
                                        <option name="مسجد" id="" value="0">مسجد</option>
                                        <option name="انبار" id="" value="1">انبار</option>
                                        <option name="حسینیه" id="" value="2">حسینیه</option>
                                        <option name="دفتر" id="" value="3">دفتر</option>
                                        </select>
                                    </td>
                                </div>
                                <div class="form-group text-center">
                                    <td>
                                        <input type='hidden' value='0' name='is_vaghf'>
                                        <input type="checkbox" class="form-check-input" id="check1" name="is_vaghf" value="1">
                                    </td>
                                </div>
                                <div class="form-group">
                                    <td><input type="text" name="date" id="" placeholder="تاریخ ثبت" class="form-control" value="{{date('Y-m-d H:i:s')}}"></td>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <td><button type="submit" class="btn btn-primary">ثبت</button></td>
                                </div>
                            </form>
                        </tr>
                    @endif
                @foreach($items as $item)
                    <tr>
                        <form method="POST" action="{{route('items.update',$item->id)}}">
                            <input type="hidden" name="_method" value="PUT" hidden>
                            <div class="form-group">
                                <td><input type="text" name="name" id="" placeholder="نام" class="form-control" value="{{$item->name}}"></td>
                            </div>
                            <div class="form-group">
                                <td><input type="text" name="code" id="" placeholder="کد شناسه" class="form-control" value="{{$item->code}}"></td>
                            </div>
                            <div class="form-group">
                                <td><select type="text" name="location" id="" placeholder="مکان" class="form-control form-select">
                                    <option name="مسجد" id="" value="0" @if($item->location == 0) selected @endif>مسجد</option>
                                    <option name="انبار" id="" value="1" @if($item->location == 1) selected @endif>انبار</option>
                                    <option name="حسینیه" id="" value="2" @if($item->location == 2) selected @endif>حسینیه</option>
                                    <option name="دفتر" id="" value="3" @if($item->location == 3) selected @endif>دفتر</option>
                                </td>
                            </div>
                            <div class="form-group">
                                <td>
                                    <input type='hidden' value='0' name='is_vaghf'>
                                    <input type="checkbox" name="is_vaghf" class="form-check-input" {{$item->is_vaghf ? 'checked' : ''}} value="1">
                                </td>
                            </div>
                            <div class="form-group">
                                <td><input type="text" name="date" id="" placeholder="تاریخ ثبت" class="form-control" value="{{$item->created_at->format('Y/m/d')}}"></td>
                            </div>
                            <div class="form-group">
                                @csrf
                                <td class="d-flex">
                                    <button type="submit" class="btn btn-success">بروزرسانی</button>
                                </form>
                                <form method="POST" action="{{route('items.delete',$item->id)}}" class="mx-2">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" hidden>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>